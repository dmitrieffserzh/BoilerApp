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
            <a class="btn btn-primary btn-sm" href="{{-- route('admin.categories.edit',$category->id) --}}">
            <i class="fas fa-pencil-alt"></i>Изменить
            </a>
            <a href="{{--route( 'admin.categories.destroy', $category->id)--}}" data-method="delete"
            data-token="{{csrf_token()}}" data-confirm="Вы уверены?" class="btn btn-danger btn-sm">
            <i class="fas fa-trash-alt"></i> Удалить
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