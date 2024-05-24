<h1>Create Category</h1>

<form method="POST" action="{{ route('categories.save') }}">
    @csrf
    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name">
    </div>
    <div>
        <label for="status">Status:</label>
        <select id="status" name="status">
            <option value="1" selected>Active</option>
            <option value="2">Inactive</option>
        </select>
    </div>
    <div>
        <label for="parent_id">Parent Category:</label>
        <select id="parent_id" name="parent_id">
            <option value="" selected>Select Parent Category</option>
            @if($categories)
                @foreach($categories as $parentCategory)
                    <option value="{{ $parentCategory->id }}">{{ $parentCategory->name }}</option>
                    @if($parentCategory->children && $parentCategory->children->count() > 0)
                        @foreach($parentCategory->children as $childCategory)
                            <option value="{{ $childCategory->id }}">-- {{ $childCategory->name }}</option>
                        @endforeach
                    @endif
                @endforeach
            @endif
        </select>
    </div>
    <button type="submit">Create</button>
</form>
