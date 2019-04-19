<div class="form-group">
    <label for="title">Наименование</label>
    <input type="text" name="title" class="form-control" id="title" aria-describedby="titleHelp"
           value="{{ $taxonomy->title ?? "" }}">
    <small id="titleHelp" class="form-text text-muted">Тут типо подсказка для манагеров и тупых</small>
</div>

<div class="form-group">
    <label for="parent_id">URL</label>
    <input type="text" name="slug" class="form-control" id="title" aria-describedby="titleHelp"
           value="{{ $taxonomy->slug ?? "" }}">
</div>

<div class="form-group">
    <label for="parent_id">Родительская категория</label>

    <select id="parent_id" class="form-control" name="parent_id">
        <option value="0">-- без родительской --</option>
         @include('admin.taxonomies.partials.form_item_list', ['taxonomies' => $taxonomies, 'parent' => $taxonomy['parent_id'] ])
    </select>
</div>

{{--<div class="form-group">--}}
    {{--<label for="parent_id">Цвет бейджа</label>--}}
    {{--<input type="text" name="color" class="form-control" id="title" aria-describedby="titleHelp"--}}
           {{--value="{{ $taxonomy->color ?? "#007bff" }}">--}}
{{--</div>--}}