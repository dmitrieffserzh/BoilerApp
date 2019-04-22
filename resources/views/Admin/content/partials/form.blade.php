<div class="form-group">
    <label for="title">Заголовок</label>
    <input type="text" name="title" class="form-control" id="title" aria-describedby="titleHelp"
           value="{{ $post->title ?? "" }}">
    <small id="titleHelp" class="form-text text-muted">Тут типо подсказка для манагеров и тупых</small>
</div>

<div class="form-group">
    <label for="parent_id">URL</label>
    <input type="text" name="slug" class="form-control" id="title" aria-describedby="titleHelp"
           value="{{ $post->slug ?? "" }}">

</div>
<input type="number" name="user_id" class="form-control" id="title" aria-describedby="titleHelp" value="1">
<div class="form-group">
    <label for="parent_id">Категория</label>
    <select id="parent_id" class="form-control" name="taxonomy_id">
        <option value="0">-- не выбрано --</option>
         @include('admin.content.partials.form_item_list', ['taxonomies' => $taxonomies, 'parent' => $post->taxonomy_id ?? '' ])
    </select>
</div>
<div class="form-group">
    <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="10">{!! $post->content ?? '' !!}</textarea>
</div>

<div class="form-group">
    <label for="exampleFormControlFile1">Изображение</label>
    <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1" value="{{ $post->image ?? '' }}">
</div>