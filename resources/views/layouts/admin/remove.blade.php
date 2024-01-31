<form action="{{ $action }}" method="DELETE">
    @method('DELETE')
    @csrf
    <button type="submit"
        style="position: absolute; background: white;
        border-radius: 50%; cursor: pointer; display: block;
        top: 35px; right: 35px; text-align: center; border: none; padding: 5px 10px">
        ✕
    </button>
</form>
