# Photo Storage Configuration

## How Photos Are Stored

Your Laravel app now has **two photo storage options**:

### 1. **Public Uploads** (✅ Recommended for Shared Hosting)
- Location: `public/uploads/`
- Path: Stored directly in the web-accessible folder
- Works on: InfinityFree, GoDaddy, Hostinger, Bluehost
- **No symlink required** - photos load immediately
- Upload Disk: `public_uploads`

### 2. **Storage Symlink** (For local/advanced hosting)
- Location: `storage/app/public/`
- Requires: `php artisan storage:link`
- Works on: Local development, VPS with symlink support
- Upload Disk: `public`

## For InfinityFree & GoDaddy

✅ **Use public/uploads folder** - it's always web-accessible

Photos stored here will automatically load because:
1. Located inside the `public/` folder (web root)
2. No symlinks needed
3. Instantly accessible via browser

## How to Use

### Upload to public folder (recommended):
```php
// Store photo in public/uploads/
$photo = $request->file('photo')->store('faculty', 'public_uploads');
// Result: /uploads/faculty/filename.jpg
```

### Upload to storage folder (local only):
```php
// Store photo in storage/app/public/
$photo = $request->file('photo')->store('faculty', 'public');
// Requires: php artisan storage:link
// Result: /storage/faculty/filename.jpg
```

## Production Deployment

### For InfinityFree/GoDaddy:
1. **No extra steps needed** - photos in `public/uploads/` are automatically accessible
2. Photos will load immediately after upload
3. Folder is readable and writable on all platforms

### For Local Development:
1. Photos can be stored in either location
2. Test with `public_uploads` to match production

## Database Schema

Photos are stored as **file paths** (text), not as binary data:

```php
// Database stores:
'photo_path' => 'uploads/faculty/photo-123.jpg'
// or
'image' => 'uploads/news/news-456.jpg'

// Access in views:
<img src="{{ asset($faculty->photo_path) }}" alt="Photo">
```

## Current Storage Structure

```
project/
├── public/
│   ├── uploads/          ← ✅ Use this on shared hosting
│   │   ├── faculty/
│   │   ├── news/
│   │   └── other/
│   └── ...
│
├── storage/
│   └── app/
│       ├── public/       ← Use on local or VPS
│       └── private/
└── ...
```

## Permissions

Make sure folder is writable:

```bash
# Local
chmod -R 775 public/uploads/

# Shared hosting (usually automatic)
# Check hosting control panel if uploads fail
```

## Troubleshooting

| Problem | Solution |
|---------|----------|
| Photos don't load | Check `public/uploads/` folder has write permissions |
| Upload fails | Ensure folder is writable (chmod 775) |
| File not found on server | Use `public_uploads` disk instead of `public` |
| 404 on image | Verify path in database matches file location |

## Next Steps

1. Configure file upload handlers to use `'public_uploads'` disk
2. Test uploads locally
3. Deploy to shared hosting (everything works automatically!)
