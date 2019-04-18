@foreach ($taxonomies as $taxonomy)

    <option value="{{$taxonomy->id ?? ""}}"

            @isset($taxonomy_id)

            @if ($taxonomy_id == $taxonomy->id)
            selected="true"
            @endif

            @endisset

    >
        {!! $delimiter ?? "" !!}{{$taxonomy->title ?? ""}}
    </option>

    @if (count($taxonomy->children) > 0)

        @include('admin.taxonomies.partials.form_item_list', [
          'taxonomies' => $taxonomy->children()->where('content_type', $content_type)->get(),
          'delimiter'  => '—' . $delimiter . ' ',
          'taxonomy_id' => $taxonomy_id
        ])

    @endif
@endforeach