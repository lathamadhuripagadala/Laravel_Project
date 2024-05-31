<div class="container">
    <h1>Categories</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-primary">Add Category</a>
    <table class="table mt-3">
        <thead>
        <tr>
            <th>Category Id</th>
            <th>Name</th>
            <th>Status</th>
            <th>Parent Id</th>
            <th>Created Date</th>
            <th>Updated Date</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->full_name }}</td>
                <td>{{ $category->status ? 'Enabled' : 'Disabled' }}</td>
                <td>{{ $category->parent_id }}</td>
                <td>{{ $category->created_at }}</td>
                <td>{{ $category->updated_at }}</td>
                <td>
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('categories.delete', $category->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
