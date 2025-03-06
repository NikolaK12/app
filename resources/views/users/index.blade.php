<x-layout>


    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>

                    <td>
                        <a href="{{ route('users.show', $user) }}">
                            <x-user :user="$user" />
                        </a>
                    </td>
                    <td>{{ $user->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>


</x-layout>
