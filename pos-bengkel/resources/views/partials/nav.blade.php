<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container">
<a class="navbar-brand" href="{{ url('/') }}">POS Bengkel</a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
<span class="navbar-toggler-icon"></span>
</button>


<div class="collapse navbar-collapse" id="navMenu">
<ul class="navbar-nav me-auto mb-2 mb-lg-0">
<li class="nav-item"><a class="nav-link" href="{{ route('customers.index') }}">Customers</a></li>
<li class="nav-item"><a class="nav-link" href="{{ route('services.index') }}">Services</a></li>
<li class="nav-item"><a class="nav-link" href="{{ route('transactions.index') }}">Transactions</a></li>
</ul>


<ul class="navbar-nav ms-auto">
@auth
<li class="nav-item"><span class="nav-link">{{ auth()->user()->name }}</span></li>
<li class="nav-item">
<form method="POST" action="{{ route('logout') }}">@csrf
<button class="btn btn-sm btn-outline-secondary" type="submit">Logout</button>
</form>
</li>
@else
<li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
@endauth
</ul>
</div>
</div>
</nav>