
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
    <h2 class="mb-4">Create Invoice</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>There were some problems with your input:</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('invoice.store') }}">
        @csrf

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Client Name</label>
                <input name="client_name" value="{{ old('client_name') }}" required class="form-control" placeholder="Enter client name">
            </div>
            <div class="col-md-6">
                <label class="form-label">Email</label>
                <input name="email" type="email" value="{{ old('email') }}" required class="form-control" placeholder="Enter email">
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Item Description</label>
            <input name="item_description" value="{{ old('item_description') }}" required class="form-control" placeholder="Item details">
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <label class="form-label">Quantity</label>
                <input name="quantity" type="number" value="{{ old('quantity') }}" required class="form-control" placeholder="e.g. 5">
            </div>
            <div class="col-md-4">
                <label class="form-label">Price per Item</label>
                <input name="price_per_item" type="number" step="0.01" value="{{ old('price_per_item') }}" required class="form-control" placeholder="e.g. 99.99">
            </div>
            <div class="col-md-4">
                <label class="form-label">Tax (%)</label>
                <input name="tax_percentage" type="number" step="0.01" value="{{ old('tax_percentage') }}" required class="form-control" placeholder="e.g. 10">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Create Invoice</button>
    </form>
</div>

