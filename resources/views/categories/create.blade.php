<div class="container">
    <h1>Add Category</h1>
    <form action="{{ route('categories.save') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="1">Enabled</option>
                <option value="0">Disabled</option>
            </select>
        </div>
        <div class="form-group">
            <label for="parent_id">Parent Category</label>
            <select name="parent_id" id="parent_id" class="form-control">
                <option value="">None</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->full_name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add Category</button>
    </form>
</div>
