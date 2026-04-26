<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(): View
    {
        $reviews = Review::query()
            ->with('reviewable')
            ->latest()
            ->get();

        return view('admin.pages.reviews.index', compact('reviews'));
    }

    public function approve(Review $review): RedirectResponse
    {
        $review->update(['is_published' => true]);

        return back()->with('success', 'Review approved successfully.');
    }

    public function disapprove(Review $review): RedirectResponse
    {
        $review->update(['is_published' => false]);

        return back()->with('success', 'Review disapproved successfully.');
    }

    public function destroy(Review $review): RedirectResponse
    {
        $review->delete();

        return back()->with('success', 'Review deleted successfully.');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_name' => 'required|string|max:255',
            'reviewable_id' => 'required|integer',
            'reviewable_type' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);


        Review::create($validated);

        return back()->with('success', 'Review submitted successfully and is pending approval.');
    }
}
