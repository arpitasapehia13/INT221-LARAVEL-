
<!-- //Display user using FOR -->

<!-- @for ($i = 0; $i < count($users);$i++)
 <li>{{$users[$i]}}<li>
@endfor -->



<!-- //Display user using FOREACH -->
 <!-- @foreach($users as $user)
 <p>This is user {{$user}}</p>
 @endforeach -->


 
<!-- //Display user using FORELSE -->
 @forelse($users as $user)
 <li> {{$user}} </li>
 @empty
 <p>No users </p>
 @endforelse