<h1>Edit Category</h1>

<form method="POST" action="{{ route('categories.update', $category->id) }}">
    @csrf
    @method('PUT')
    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ $category->name }}">
    </div>
    <div>
        <label for="status">Status:</label>
        <select id="status" name="status">
            <option value="1" {{ $category->status === 1 ? 'selected' : '' }}>Active</option>
            <option value="2" {{ $category->status === 2 ? 'selected' : '' }}>Inactive</option>
        </select>
    </div>
    <div>
        <label for="parent_id">Parent Category:</label>
        <select id="parent_id" name="parent_id">
            <option value="" selected>Select Parent Category</option>
            @foreach($categories as $parentCategory)
                @if($parentCategory->id !== $category->id)
                    <option value="{{ $parentCategory->id }}">{{ $parentCategory->name }}</option>
                    @if($parentCategory->children && $parentCategory->children->count() > 0)
                        @foreach($parentCategory->children as $childCategory)
                            <option value="{{ $childCategory->id }}">-- {{ $childCategory->name }}</option>
                        @endforeach
                    @endif
                @endif
            @endforeach
        </select>
    </div>
    <button type="submit">Update</button>
</form>
