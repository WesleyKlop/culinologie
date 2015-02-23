@extends('app')

@section('content')

<div class="container">
	<div class="row">
                @if(Session::has('return_url'))
		<div class="col-md-3">
                    <p><a href="{{ Session::get('return_url') }}" class="btn btn-default">&larr; Terug</a></p>
                </div>
                @endif
		<div class="col-md-9 col-md-offset-3">
                    <h1>{{ $recipe->title }}</h1>

                    @if($recipe->people != 0)
                    <p>Voor {{ $recipe->people }} personen.</p>
                    @endif
                </div>
        </div>
	<div class="row">
		<div class="col-md-3">
                    <h2>Ingrediënten</h2>

                    @foreach($ingredient_groups as $title => $group)
                        <h4>{{ $title }}</h4>
                        <ul>
                        @foreach($group as $in)
                            <li>{{ $in->text }}</li>
                        @endforeach
                        </ul>
                    @endforeach
                </div>
		<div class="col-md-9">
                    <h2>Bereiding</h2>

                    {!! $recipe->description_html !!}

                    @if(!empty($recipe->presentation))
                    <h2>Finishing touches</h2>

                    {!! $recipe->presentation_html !!}
                    @endif
                </div>
	</div>
</div>

@endsection
