<div class="row mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body" style="padding: 20px">
                <div class="card-title">
                    <h2>Your Answer</h2>
                </div>
                <hr>
                <form action="{{route('question.answer.store', $question)}}" method="POST">
                    @csrf
                    <div class="input-field">
                        <i class="material-icons prefix">mode_edit</i>
                        <textarea class="materialize-textarea" name="body" id="create_answer"></textarea>
                        <label for="create_answer">Answer</label>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit answer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>