@extends('backend.layouts.master') {{-- Adjust if you're not using a layout --}}

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Ask with AI About your Health</h2>

    {{-- Form to send prompt --}}
    <form method="POST" action="{{ url('/gemini/generate') }}">
        @csrf
        <div class="mb-3">
            <input type="text" name="text" class="form-control" placeholder="Enter your question..." value="{{ old('text') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Ask</button>
    </form>

    {{-- Show Gemini's response --}}
    @isset($reply)
        <div class="card mt-4">
            <div class="card-header bg-success text-white">
                Gemini's Response
            </div>
            <div class="card-body">
                <p>{{ $reply }}</p>
            </div>
        </div>
        <div class="mt-3 text-end">
            <button class="btn btn-outline-success" onclick="exportToPDF()">Download as PDF</button>
        </div>

    @endisset

    @push('scripts')
<script>
    async function exportToPDF() {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();

        const user = "You: {{ $question ?? '' }}";
        const gemini = "Gemini: {{ $reply ?? '' }}";

        let y = 10;

        doc.setFontSize(12);
        doc.setTextColor(0, 0, 0);
        doc.text(user, 10, y);

        y += 10;

        const lines = doc.splitTextToSize(gemini, 180);
        doc.text(lines, 10, y);

        const fileName = 'Gemini_Response_' + new Date().getTime() + '.pdf';
        doc.save(fileName);
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
@endpush


    <!-- @isset($reply)
    <div class="card mt-4">
        <div class="card-header bg-success text-white">
            Gemini's Response to: <strong>{{ $question }}</strong>
        </div>
        <div class="card-body">
            <p>{{ $reply }}</p>
        </div>
    </div>
@endisset -->

</div>
@endsection

