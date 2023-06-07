<div class="form-group mr-5">
    <select name="status_id" id="status{{ $id ?? rand(0,999999) }}" class="form-control select2bs4 select2-hidden-accessible" style="min-width: 200px" required>
        <option value="" selected disabled>
            Сделайте выбор
        </option>
        @foreach($statuses as $status)
            <option value="{{ $status->id }}" @if((isset($item) and $item->status_id == $status->id) or (!isset($item) and $loop->iteration == 1)) selected @endif>
                {{ $status->title }}
            </option>
        @endforeach
    </select>
</div>
