@extends('layouts.app')

@section('title', 'Edit User')

@section('contents')
<div class="col-12">
    <div class="card recent-sales overflow-auto">
        <div class="card-body">
            <div class="container">
                <div id="editMode">
                    <!-- Edit User Data in Edit Mode -->
                    <h2>Edit User</h2>
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf @method('PUT')
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $user->name }}" />
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $user->email }}" />
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label class="form-label">Role</label>
                                    <select name="role" class="form-control">
                                        <option value="admin" {{ ($user->role === 'admin') ? 'selected' : '' }}>Admin</option>
                                        <option value="user" {{ ($user->role === 'user') ? 'selected' : '' }}>User</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password" value="{{ $user->password }}" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <center>
                            <div class="col-md-4">
                                <button class="btn btn-warning">Update</button>
                                <button type="button" class="btn btn-secondary" id="cancelButton">Cancel</button>
                            </div>
                        </center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
     $("#cancelButton").click(function() {
            var newUrl = "{{ route('products') }}"; 
            window.location.href = newUrl;
        });
    });
</script>

@endsection
