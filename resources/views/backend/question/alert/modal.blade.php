<div class="modal fade" data-backdrop="1" id="exampleModal{{ $question->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">X</span>
                </button>
                <h2 class="modal-title" id="exampleModalLabel">Are you sure?</h2>
            </div>
            <div class="modal-body">
                <h4>Want to delete <span style="color: red">{{ $question->question }}</span> ?</h4>
            </div>
            <div class="modal-footer">
                <form action="{{ route('question.destroy', [$question->id]) }}" method="POST">
                    @method('Delete')
                    @csrf
                    <button class="btn btn-danger" type="submit">Yes, delete it!</button>
                </form>
            </div>
        </div>
    </div>
</div>