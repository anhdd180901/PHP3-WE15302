<table>
    <thead>
        <th>ID</th>
        <th>Name</th>
    </thead>
    <tbody>
        @csrf
        @foreach($cate as $c)
        <tr>
            <td>
                {{$c -> id}}
            </td>
            <td>
                {{$c -> name}}
            </td>
            <td>
                <form action="{{route('cate.remove', ['id' => $c->id])}}" method="post">
                    @csrf
                    <button type="submit">xoa'</button>
                </form>
            </td>
        </tr>
        @endforeach 
    </tbody>
</table>