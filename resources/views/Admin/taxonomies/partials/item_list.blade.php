@foreach ($taxonomies as $taxonomy)
    <tr>
        <td class="text-center">
            <span class=""
                  style="
                        background: #4973ef;
                        display: inline-block;
                        width: 10px;
                        height: 10px;
                        border-radius: 25%;
                    "></span>
        </td>
        <td>
            {!! $delimiter ?? "" !!}<a href="{{-- route('admin.categories.show',$category->id) --}}"
                                       class="text-dark">{{$taxonomy->title}}</a>
        </td>
        <td class="text-muted">
            {{ $taxonomy->slug }}
        </td>
        <td class="text-muted">
            <div class="btn-group float-right" role="group">
            <a class="btn btn-primary btn-sm" href="{{ route('posts.category.edit', $taxonomy->id) }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="admin-feather feather-edit">
                    <path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"></path>
                    <polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon>
                </svg>
            </a>
            <a href="{{--route( 'admin.categories.destroy', $category->id)--}}" data-method="delete"
            data-token="{{csrf_token()}}" data-confirm="Вы уверены?" class="btn btn-danger btn-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="admin-feather feather-trash">
                    <polyline points="3 6 5 6 21 6"></polyline>
                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                </svg>
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