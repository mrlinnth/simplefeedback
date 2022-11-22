<!-- feedbacks.form component from mrlinnth/simplefeedback -->
<div>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form method="POST" action="{{ route('simplefeedbacks.store') }}" enctype="multipart/form-data">
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
        <label for="type">Type</label><br>
        <select name="type" id="type">
            <option value="bug">Bug</option>
            <option value="enhancement">Request</option>
            <option value="question">Question</option>
        </select><br>
        <label for="title">Title</label><br>
        <input type="text" id="title" name="title"><br>
        <label for="body">Description</label><br>
        <textarea id="body" name="body"></textarea><br>
        <label for="screenshot">Screenshot</label><br>
        <input type="file" id="screenshot" name="screenshot" accept="image/*, video/*"><br>
        <input type="submit" value="Submit">
    </form>
</div>
