@foreach ($taxonomies as $taxonomy)
    <tr>
        <td class="text-center">
            <span class=""
                  style="
                          background: {{ $taxonomy->color }};
                          display: inline-block;
                          width: 10px;
                          height: 10px;
                          border-radius: 25%;
                          "></span>
        </td>
        <td>
            {!! $delimiter ?? "" !!}<a href="{{ route($content_type.'.category.edit', $taxonomy->id) }}"
                                       class="text-dark">{{$taxonomy->title}}</a>
        </td>
        <td class="text-muted">
            {{ $taxonomy->slug }}
        </td>
        <td class="text-muted">
            <div class="btn-group float-right" role="group">
                <a class="btn btn-primary btn-sm" href="{{ route($content_type.'.category.edit', $taxonomy->id) }}"
                   style="line-height: 1.1;">
                    &#9998;
                </a>
                <a href="{{ route( $content_type.'.category.delete', $taxonomy->id) }}" data-method="delete"
                   data-token="{{csrf_token()}}" data-confirm="Вы уверены?" class="btn btn-danger btn-sm"
                   style="line-height: 1.1;">
                    &#10006;
                </a>
            </div>
        </td>
    </tr>
    @if(count($taxonomy->children) > 0 )
        @include('admin.taxonomies.partials.item_list', [
          'taxonomies' => $taxonomy->children()->where('content_type', $content_type)->get(),
          'delimiter'  => '—' . $delimiter . ' '
        ])
    @endif
@endforeach