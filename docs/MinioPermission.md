# 403 forbiddden error due to all minio files are private
If you want all files in your MinIO bucket to be publicly readable in the frontend, you can do this by setting a bucket policy

## 1. Install Minio CLI client 'mc'

## 2. Create an alias for the S3-compatible service
`mc alias set myminio https://host.example.net ACCESS_KEY SECRET_KEY`

## 3. Test the connection
`mc admin info myminio`

## 4. list all buckets
`mc ls myminio`

## 5. Set read only public
`mc policy set public myminio/sundaram`

## 6. Verify the policy
`mc anonymous get myminio/sundaram`

Output should be
``Access permission for myminio/sundaram is public``