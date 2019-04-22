@foreach ($posts as $post)
    <tr>
        <td>
            <a href="{{ route($content_type.'.edit', $post->id) }}" class="text-dark">{{$post->title}}</a>
        </td>
        <td class="text-muted">
                        <span class=""
                              style="
                                      background: {{ $post->taxonomy->color }};
                                      display: inline-block;
                                      width: 10px;
                                      height: 10px;
                                      border-radius: 25%;
                                      "></span> {{ $post->taxonomy->title }}
        </td>
        <td class="text-muted">
            <div class="btn-group float-right" role="group">
                <a class="btn btn-primary btn-sm" href="{{ route($content_type.'.edit', $post->id) }}"
                   style="line-height: 1.1;">
                    &#9998;
                </a>
                <a href="{{ route( $content_type.'.delete', $post->id) }}" data-method="delete"
                   data-token="{{csrf_token()}}" data-confirm="Вы уверены?" class="btn btn-danger btn-sm"
                   style="line-height: 1.1;">
                    &#10006;
                </a>
            </div>
        </td>
    </tr>
@endforeach