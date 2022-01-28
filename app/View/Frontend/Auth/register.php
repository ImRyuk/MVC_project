<div class="container">
        <h2>Register</h2>
        <p>Please fill this form to create an account.</p>
        <form action="/register" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputFirstName1" class="form-label">First Name</label>
                <input type="text" class="form-control" name="firstName" id="exampleInputFirstName1" >
            </div>
            <div class="mb-3">
                <label for="InputLastName1" class="form-label">Last Name</label>
                <input type="text" class="form-control" name="lastName" id="InputLastName1">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
</div>    