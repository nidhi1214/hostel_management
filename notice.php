<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Notice Board</title>
    <link rel="stylesheet" href="notice_style.css"> 
</head>
<body>
    <h1> Notice Board</h1>

    <div class="card-container" id="pdfContainer">
        <!-- PDF cards will be dynamically added here -->
    </div>

    <!-- JavaScript to load PDFs -->
    <script>
        // Define PDF files
        var pdfFiles = [
            { name: "PDF 1", url: "pdf1.pdf" },
            { name: "PDF 2", url: "pdf2.pdf" }
            // Add more PDFs as needed
        ];

        // Function to add PDF cards to the page
        function addPdfCards() {
            var container = document.getElementById('pdfContainer');

            pdfFiles.forEach(function(pdf) {
                var card = document.createElement('div');
                card.classList.add('card');

                var cardTitle = document.createElement('h2');
                cardTitle.textContent = pdf.name;

                var pdfFrame = document.createElement('iframe');
                pdfFrame.src = pdf.url;

                card.appendChild(cardTitle);
                card.appendChild(pdfFrame);

                container.appendChild(card);
            });
        }

        // Call the function to add PDF cards when the page loads
        window.onload = addPdfCards;
    </script>
</body>
</html>