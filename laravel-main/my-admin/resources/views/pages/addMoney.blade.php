@extends('layouts.app')
@section('title', 'Add Money')
@section('content')

<!-- Sidebar Add Money Form -->
<div class="card mt-4">
  <div class="card-header bg-light">
    <h6 class="mb-0">Add Money</h6>
  </div>
  <div class="card-body">
    <form>
      <!-- Transaction Type -->
      <div class="mb-3">
        <label for="type" class="form-label">Transaction Type</label>
        <select class="form-select" id="type" required>
          <option value="" selected disabled>Select Type</option>
          <option value="income">Income</option>
          <option value="expense">Expense</option>
        </select>
      </div>

      <!-- Amount -->
      <div class="mb-3">
        <label for="amount" class="form-label">Amount</label>
        <input
          type="number"
          class="form-control"
          id="amount"
          placeholder="Enter amount"
          required
        />
      </div>

      <!-- Category -->
      <div class="mb-3">
        <label for="category" class="form-label">Category</label>
        <select class="form-select" id="category" required>
          <option value="" selected disabled>Select Category</option>
          <option value="salary">Salary</option>
          <option value="business">Business</option>
          <option value="food">Food</option>
          <option value="travel">Travel</option>
          <option value="shopping">Shopping</option>
          <option value="others">Others</option>
        </select>
      </div>

      <!-- Note -->
      <div class="mb-3">
        <label for="note" class="form-label">Note</label>
        <textarea
          class="form-control"
          id="note"
          rows="2"
          placeholder="Add a short note..."
        ></textarea>
      </div>

      <!-- Submit -->
      <button type="submit" class="btn btn-primary w-100">
        Add Money
      </button>
    </form>
  </div>
</div>


@endsection