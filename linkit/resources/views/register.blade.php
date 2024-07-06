@extends('mainlayout')

@section('css')
<style>
    /* Container and Row */
.custom-container {
    width: 100%;
    max-width: 1140px;
    margin: 0 auto;
    padding: 20px;
}

.custom-row {
    display: flex;
    justify-content: center;
}

/* Column */
.custom-col {
    width: 100%;
    max-width: 500px;
    margin-top: 50px;
}

/* Card */
.custom-card {
    border: 1px solid #dee2e6;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    background-color: #ffffff;
}

/* Card Header */
.custom-card-header {
    padding: 15px 20px;
    border-bottom: 1px solid #dee2e6;
    background-color: #f7f7f7;
}

.custom-card-header h3 {
    margin: 0;
    font-size: 1.5rem;
    color: #004085;
}

/* Card Body */
.custom-card-body {
    padding: 20px;
}

.custom-form-group {
    margin-bottom: 15px;
}

.custom-form-label {
    display: block;
    margin-bottom: 5px;
    font-weight: 500;
    color: #004085;
}

.custom-form-control {
    width: 100%;
    padding: 10px;
    border: 1px solid #ced4da;
    color: #004085;
}

/* Buttons */
.custom-btn-group {
    display: flex;
    justify-content: space-between;
}

.custom-btn {
    padding: 10px 20px;
    border: none;
    text-align: center;
    cursor: pointer;
    transition: background-color 0.3s;
    text-decoration: none;
    color: #ffffff;
}

.custom-btn-primary {
    background-color: #0056b3;
}

.custom-btn-primary:hover {
    background-color: #003f7f;
}

.custom-btn-secondary {
    background-color: #6c757d;
}

.custom-btn-secondary:hover {
    background-color: #5a6268;
}

/* Alert */
.custom-alert {
    padding: 10px;
    border: 1px solid #f5c6cb;
    background-color: #f8d7da;
    color: #721c24;
    margin-bottom: 15px;
}

/* Card Footer */
.custom-card-footer {
    padding: 15px 20px;
    border-top: 1px solid #dee2e6;
    text-align: center;
    background-color: #f7f7f7;
}

.custom-btn-link {
    text-decoration: none;
    color: #0056b3;
    transition: color 0.3s;
}

.custom-btn-link:hover {
    color: #003f7f;
}

</style>
@endsection

@section('content')
<div class="custom-container">
    <div class="custom-row">
        <div class="custom-col">
            <div class="custom-card">
                <div class="custom-card-header">
                    <h3>Register</h3>
                </div>
                <div class="custom-card-body">
                    @if ($errors->any())
                        <div class="custom-alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('registerSave') }}" method="POST">
                        @csrf
                        <div class="custom-form-group">
                            <label for="name" class="custom-form-label">Name</label>
                            <input type="text" name="name" class="custom-form-control" id="name" placeholder="Momna Batool" required value="{{ old('name') }}">
                        </div>
                        <div class="custom-form-group">
                            <label for="email" class="custom-form-label">Email</label>
                            <input type="email" name="email" class="custom-form-control" id="email" placeholder="smomnabatool@gmail.com" required value="{{ old('email') }}">
                        </div>
                        <div class="custom-form-group">
                            <label for="password" class="custom-form-label">Password</label>
                            <input type="password" name="password" class="custom-form-control" id="password" placeholder="strong password please" required>
                        </div>
                        <div class="custom-form-group">
                            <label for="password_confirmation" class="custom-form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="custom-form-control" id="password_confirmation" placeholder="Re-enter Password" required>
                        </div>
                        <div class="custom-btn-group">
                            <button type="submit" class="custom-btn custom-btn-primary">Register</button>
                            <a href="{{ route('home') }}" class="custom-btn custom-btn-secondary">Back</a>
                        </div>
                    </form>
                </div>
                <div class="custom-card-footer">
                    <a href="{{ route('login') }}" class="custom-btn-link">Already have an account? Login</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
