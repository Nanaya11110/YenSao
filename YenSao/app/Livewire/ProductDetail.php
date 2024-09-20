<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\comment;
use App\Models\product;
use Illuminate\Log\Logger;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ProductDetail extends Component
{
    public $product;
    public $pick = 1;
    public $comments;
    public $commentcontent;
    public $rating;
    public $IsReplying = false;
    public $ReplyCommentId;
    public $ReplyCommentContent;
    public $UpdateCommentContent;
    public $StarRating = 0;
    public $IsEditable = 0;
    #[On('updateStarRating')]
    public function updateStarRating($star)
    {
        $this->StarRating = $star;
    }
    public function IsLogin()
    {
        return auth()->check();
    }
    public function mount($id)
    {
        $this->product = product::find($id);
        $this->product->click++;
        $this->product->save();
    }

    public function EditComment($id)
    {
        $this->IsEditable = $id;
        $this->UpdateCommentContent = comment::find($id)->text;
    }

    public function AddReply()
    {
        if (!$this->IsLogin()) return redirect()->route('Login');
        $comment = new comment();
        $comment->user_id = auth()->user()->id;
        $comment->product_id = $this->product->id;
        $comment->text = $this->ReplyCommentContent;
        $comment->parent_id = $this->ReplyCommentId;
        $comment->star = null;
        $comment->save();
        $this->dispatch('UpdateStar');
        $this->StarRating = 0;
        $this->reset('commentcontent', 'IsReplying', 'ReplyCommentId', 'ReplyCommentContent');
    }

    public function AddComment()
    {
        if (!$this->IsLogin()) return redirect()->route('Login');
        $comment = new comment();
        $comment->user_id = auth()->user()->id;
        $comment->product_id = $this->product->id;
        $comment->text = $this->commentcontent;
        $comment->parent_id = null;
        $comment->star = $this->StarRating;
        $comment->save();
        $this->dispatch('UpdateStar');
        $this->StarRating = 0;
        $this->reset('commentcontent', 'IsReplying', 'ReplyCommentId', 'ReplyCommentContent');
    }
    public function UpdateComment()
    {
        $this->validate(
            [
                'UpdateCommentContent' => ['required', 'string', 'max:255'],
            ],
            [
                'required' => 'Phần bình luận không được để trống',
            ],
        );
        $comment = comment::find($this->IsEditable);
        $comment->text = $this->UpdateCommentContent;
        $this->IsEditable = 0;
        $comment->save();
    }
    public function SetReplyComment($id)
    {
        $this->IsReplying = true;
        $this->ReplyCommentId = $id;
    }

    public function CancelReply()
    {
        $this->IsReplying = false;
        $this->ReplyCommentId = null;
    }
    public function DeleteComment(comment $comment)
    {
        $comment->delete();
        $childcomment = comment::where('parent_id', $comment->id)->delete();
    }

    public function AddToCart()
    {
        if (!$this->IsLogin()) return redirect()->route('Login');
        $CartItem = Cart::where('user_id', auth()->user()->id)
            ->where('product_id', $this->product->id)
            ->first();
        $item = new Cart();
        //CHECK IF THERE IS A ITEM IN THE CART OR NOT
        if ($CartItem) {
            $CartItem->quantity++;
            $CartItem->save();
        } else {
            $item->user_id = auth()->user()->id;
            $item->product_id = $this->product->id;
            $item->quantity = 1;
            $item->price = $this->product->price;
            $item->save();
        }
        $this->dispatch('AddToCart');
    }

    public function CheckOut()
    {
        return redirect()->route('CheckOut');
    }
    public function render()
    {
        $this->comments = comment::where('product_id', $this->product->id)->get();
        if (!$this->comments->isEmpty()) {
            $this->rating = round(($this->comments->sum('star') / $this->comments->where('star', '<>', null)->count()) * 2) / 2;
        }

        return view('livewire.productDetail');
    }
}
