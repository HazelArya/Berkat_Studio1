<h1>Packages</h1>

<ul>
    @foreach($packages as $package)
        <li>
            {{ $package->title }} ({{ $package->class }})
            <a href="{{ route('packages.show', $package->id) }}">View</a>
            <a href="{{ route('packages.edit', $package->id) }}">Edit</a>
            <a href="{{ route('packages.destroy', $package->id) }}">Delete</a>
        </li>
    @endforeach
</ul>