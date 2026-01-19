<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Faculty Member</title>
    <style>
        /* Modern System Font Stack (No APIs) */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif;
            min-height: 100vh;
            padding: 40px 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-container {
            background: white;
            padding: 50px;
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 600px;
            border: none;
            animation: slideUp 0.6s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h2 {
            margin-top: 0;
            color: #2c3e50;
            font-size: 28px;
            text-align: center;
            margin-bottom: 10px;
            font-weight: 700;
            letter-spacing: -0.5px;
        }

        .subtitle {
            text-align: center;
            color: #7f8c8d;
            font-size: 14px;
            margin-bottom: 30px;
            font-weight: 500;
        }

        .form-group {
            margin-bottom: 25px;
            animation: fadeIn 0.6s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: 600;
            color: #34495e;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"],
        textarea {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #ecf0f1;
            border-radius: 10px;
            font-size: 15px;
            box-sizing: border-box;
            transition: all 0.3s ease;
            font-family: inherit;
            background-color: #f8f9fa;
        }

        input[type="text"]::placeholder,
        input[type="number"]::placeholder,
        textarea::placeholder {
            color: #bdc3c7;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        input[type="file"]:focus,
        textarea:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
            background-color: #fff;
        }

        textarea {
            resize: vertical;
            min-height: 90px;
            font-size: 14px;
        }

        .file-input-wrapper {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            padding: 20px;
            border-radius: 10px;
            border: 2px dashed #667eea;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .file-input-wrapper:hover {
            border-color: #764ba2;
            background: linear-gradient(135deg, #f8fafc 0%, #d4d9e8 100%);
        }

        .file-input-wrapper input[type="file"] {
            display: none;
        }

        button {
            width: 100%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 16px;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 15px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(102, 126, 234, 0.4);
        }

        button:active {
            transform: translateY(0);
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 25px;
            color: #667eea;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .back-link:hover {
            color: #764ba2;
        }

        @media (max-width: 1200px) {
            .page-container { gap: 30px; padding: 30px 15px; }
            .section-header { font-size: 2rem; }
        }

        @media (max-width: 992px) {
            .page-container { flex-direction: column; padding: 20px; gap: 20px; }
            .sidebar-column { order: 2; min-width: 100%; }
            .content-column { order: 1; }
            .section-header { font-size: 1.8rem; }
        }

        @media (max-width: 768px) {
            .form-container {
                padding: 30px 20px;
            }
            h2 {
                font-size: 24px;
            }
            .form-group { margin-bottom: 20px; }
            input, textarea, select { font-size: 1rem; padding: 12px; }
        }

        @media (max-width: 576px) {
            body {
                padding: 20px 15px;
            }
            .form-container {
                padding: 25px 15px;
            }
            h2 {
                font-size: 20px;
            }
            .subtitle {
                font-size: 12px;
            }
        }

        @media (max-width: 480px) {
            .form-container { padding: 20px; }
            h2 { font-size: 18px; }
            input, textarea, select { font-size: 0.9rem; padding: 10px; }
            button { padding: 12px; font-size: 14px; }
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>📚 Add Faculty Member</h2>
    <div class="subtitle">Create a new faculty profile in our system</div>

    <form action="/faculty/store" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label for="name">👤 Full Name</label>
            <input type="text" name="name" id="name" placeholder="e.g. Dr. John Doe" required>
        </div>

        <div class="form-group">
            <label for="department">🏢 Department</label>
            <input type="text" name="department" id="department" placeholder="e.g. Computer Science" required>
        </div>

        <div class="form-group">
            <label for="designation">💼 Designation</label>
            <input type="text" name="designation" id="designation" placeholder="e.g. Assistant Professor">
        </div>

        <div class="form-group">
            <label>
                <input type="checkbox" name="is_hod" id="is_hod" value="1" style="margin-right: 8px; width: auto;">
                <span style="font-weight: 600; color: #34495e;">🎓 Head of Department (HOD)</span>
            </label>
        </div>

        <div class="form-group">
            <textarea name="qualification" id="qualification" rows="3" placeholder="Degrees, specializations"></textarea>
        </div>

        <div class="form-group">
            <label for="area_of_interest">🔬 Area of Interest</label>
            <textarea name="area_of_interest" id="area_of_interest" rows="3" placeholder="Research / teaching interests"></textarea>
        </div>

        <div class="form-group">
            <label for="teaching_experience">📖 Teaching Experience</label>
            <textarea name="teaching_experience" id="teaching_experience" rows="3" placeholder="List of institutions, years"></textarea>
        </div>

        <div class="form-group">
            <label for="industrial_experience">🏭 Industrial Experience</label>
            <textarea name="industrial_experience" id="industrial_experience" rows="2" placeholder="If any"></textarea>
        </div>

        <div class="form-group">
            <label for="vidwan_id">🔗 Vidwan ID</label>
            <input type="text" name="vidwan_id" id="vidwan_id" placeholder="Vidwan identifier">
        </div>

        <div class="form-group">
            <label for="orcid_id">📝 ORCID ID</label>
            <input type="text" name="orcid_id" id="orcid_id" placeholder="0000-0000-0000-0000">
        </div>

        <div class="form-group">
            <label for="scopus_id">📊 Scopus ID</label>
            <input type="text" name="scopus_id" id="scopus_id" placeholder="Scopus author id">
        </div>

        <div class="form-group">
            <label for="google_scholar_id">🎓 Google Scholar ID</label>
            <input type="text" name="google_scholar_id" id="google_scholar_id" placeholder="Google Scholar user id">
        </div>

        <div class="form-group">
            <label for="experience_years">⏱️ Years of Experience</label>
            <input type="number" name="experience_years" id="experience_years" placeholder="0" required min="0">
        </div>

        <div class="form-group">
            <label>📷 Profile Photo</label>
            <div class="file-input-wrapper">
                <input type="file" name="photo" accept="image/*" required>
                <p style="margin: 0; color: #667eea; font-size: 14px; font-weight: 600;">📤 Click to upload profile photo</p>
            </div>
        </div>

        <button type="submit">💾 Save Faculty Profile</button>
    </form>
</div>

</body>
</html>