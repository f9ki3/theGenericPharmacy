<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TGP</title>
    <?php include 'session.php'?>
    <?php include 'header_links.php'?>
</head>
<body>
    <div class="p-3">
            <div class="row">
                <div class="col-12 col-md-2" style="height: 100vh;">
                    <?php include 'navbar.php'?>
                </div>
            <div class="col-12 col-md-10">
            <div class="row">
            <div class="rounded rounded-4 border p-4" style="height: auto">
                <div class="d-flex flex-row mb-3 justify-content-between align-items-center">
                    <h5 class="fw-bolder" id="categoryTitle">Allergy and Inflammation</h5>
                    <select name="" class="form-control w-25" id="categorySelect">
                        <option value="Allergy and Inflammation">Allergy and Inflammation</option>
                        <option value="Antibiotics and Antimicrobials">Antibiotics and Antimicrobials</option>
                        <option value="CardioVascular">CardioVascular</option>
                        <option value="Essentials">Essentials</option>
                        <option value="Gastrointestinal Medication">Gastrointestinal Medication</option>
                        <option value="Hematologic Medication">Hematologic Medication</option>
                        <option value="Metabolic Disorders Medications">Metabolic Disorders Medications</option>
                        <option value="Musculoskeletal">Musculoskeletal</option>
                        <option value="Necessities">Necessities</option>
                        <option value="Neurological Medications">Neurological Medications</option>
                        <option value="Pain Relief Medications">Pain Relief Medications</option>
                        <option value="Renal & Urinary Medications">Renal & Urinary Medications</option>
                        <option value="Respiratory Medications">Respiratory Medications</option>
                    </select>
                </div>

                <!-- Wrapper for the table -->
                <div id="tableWrapper" class="table-responsive" style="display:none;">
                    <table id="SalesProducts" class="display table-striped">
                        <thead>
                            <tr>
                                <th>Month and Year</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Sales</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>

                <div id="loadingIndicator" style="display: none;">Loading, please wait...</div>




            </div>

        </div>

    </div>
    <?php include 'footer_links.php'?>
</body>
</html>