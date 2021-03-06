<answer :answer="{{ $answer }}" inline-template>
    <div class="media post">
{{--        @include ('shared._vote', [--}}
{{--            'model' => $answer--}}
{{--        ])--}}
        <vote :model="{{ $answer }}" name="answer"></vote>

        <div class="media-body">
            <form v-if="editing" @submit.prevent="update">
                <div class="form-group">
                    <textarea rows="10" v-model="body" class="form-control" required></textarea>
                </div>
                <button class="btn btn-primary" :disabled="isInvalid">Update</button>
                <button class="btn btn-outline-secondary" @click="cancel" type="button">Cancel</button>
            </form>
            <div v-else>
                <div v-html="bodyHtml"></div>
                <div class="row">
                    <div class="col-4">
                        <div class="ml-auto">
                            {{--                                            @if(\Illuminate\Support\Facades\Auth::user()->can('update-question',$question))--}}
                            @can('update',$answer)
                                <a @click.prevent="edit" class="btn btn-sm btn-outline-info">Edit</a>
                            @endcan
                            {{--                                            @endif--}}
                            {{--                                            @if(\Illuminate\Support\Facades\Auth::user()->can('delete-question',$question))--}}
                            @can('delete', $answer)
                                <button @click="destroy" class="btn btn-sm btn-outline-danger">Delete</button>                                {{--                                            @endif--}}
                            @endcan
                        </div>
                    </div>
                    <div class="col-4"></div>
                    <div class="col-4">
                        {{--                @include('shared._author',[--}}
                        {{--                'model' => $answer,--}}
                        {{--                'label' => 'Answered'--}}
                        {{--                ])--}}
                        <user-info :model="{{ $answer }}" label="Answered"></user-info>
                    </div>
                </div>
            </div>
        </div>
    </div>
</answer>