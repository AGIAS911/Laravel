<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3">
                    <h5 class="card-title mb-0 fw-bold">Create New User</h5>
                </div>

                <div class="card-body p-4">
                        <div class="alert alert-danger mb-4">
                           
                        </div>
                  
                    <form action="{{route('userStore')}}" method="POST">
                     @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">Full Name</label>
                            <input 
                                type="text" 
                                class="form-control @error('name') is-invalid @enderror" 
                                id="name" 
                                name="name" 
                                value=""
                                placeholder="e.g. John Doe"
                                required 
                                autofocus
                            >
                                <div class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">Email Address</label>
                            <input 
                                type="email" 
                                class="" 
                                id="email" 
                                name="email" 
                                value="" 
                                placeholder="name@example.com"
                                required
                            >
                                <div class="invalid-feedback"></div>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold">Password</label>
                            <input 
                                type="password" 
                                class="" 
                                id="password" 
                                name="password" 
                                placeholder="Minimum 8 characters"
                                required
                            >
                           
                        </div>

                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label fw-semibold">Confirm Password</label>
                            <input 
                                type="password" 
                                class="form-control" 
                                id="password_confirmation" 
                                name="password_confirmation" 
                                placeholder="Re-enter password"
                                required
                            >
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="" class="btn btn-outline-secondary">
                                Cancel
                            </a>
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="bi bi-check-lg me-1"></i> Save User
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
