<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Categories</h2>
            <a href="{{ route('categories.create') }}" class="btn btn-primary mb-2">Add Category</a>
            <table class="table">
                <thead>
                <tr>
                    <th>Category ID</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Parent Category</th>
                    <th>Created Date</th>
                    <th>Updated Date</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->status == 1 ? 'Active' : 'Disabled' }}</td>
                        <td>{{ $category->hierarchy }}</td>
                        <td>{{ $category->created_at }}</td>
                        <td>{{ $category->updated_at }}</td>
                        <td>
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form method="POST" action="{{ route('categories.delete', $category->id) }}" style="display: inline;">
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
    </div>
</div>
