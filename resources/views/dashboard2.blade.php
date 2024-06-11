<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    @if($data['success'])
        <h1>{{ $data['message'] }}</h1>
        <h2>Token: {{ $data['data']['token'] }}</h2>
        
        <h3>User Information:</h3>
        <ul>
            <li>ID: {{ $data['data']['user']['id'] }}</li>
            <li>Name: {{ $data['data']['user']['name'] }}</li>
            <li>Email: {{ $data['data']['user']['email'] }}</li>
            <li>Email Verified At: {{ $data['data']['user']['email_verified_at'] }}</li>
            <li>Created At: {{ $data['data']['user']['created_at'] }}</li>
            <li>Updated At: {{ $data['data']['user']['updated_at'] }}</li>
        </ul>

        <h3>User Roles:</h3>
        <ul>
            @foreach ($data['data']['user']['roles'] as $role)
                <li>Role ID: {{ $role['id'] }}, Role Name: {{ $role['name'] }}</li>
            @endforeach
        </ul>

        <h3>Companies:</h3>
        @if(empty($data['data']['user']['companies']))
            <p>No companies associated.</p>
        @else
            <ul>
                @foreach ($data['data']['user']['companies'] as $company)
                    <li>{{ $company['name'] }}</li>
                @endforeach
            </ul>
        @endif

        @if($data['data']['selected_company_id'])
            <p>Selected Company ID: {{ $data['data']['selected_company_id'] }}</p>
        @else
            <p>No company selected.</p>
        @endif
    @else
        <h1>Login Failed</h1>
        <p>{{ $data['message'] }}</p>
    @endif
</body>
</html>
