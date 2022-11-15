<!-- feedbacks.form component from mrlinnth/simplefeedback -->
<div>
    <form method="POST" action="{{ route('simplefeedbacks.store') }}">
        @csrf
        @php
            $data = [
                'agent' => request()->header('user-agent'),
                'auth_user' => auth()->user(),
                'method' => request()->method(),
                'session' => request()
                    ->session()
                    ->all(),
                'url' => request()->fullUrl(),
            ];
        @endphp
        <input type="hidden" name="data" value="{{ json_encode($data) }}">
        <label for="title">Title</label><br>
        <input type="text" id="title" name="title"><br>
        <label for="body">Description</label><br>
        <textarea id="body" name="body"></textarea><br>
        <input type="submit" value="Submit">
    </form>
</div>
