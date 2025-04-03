# PHP Slim Tutorial Deploy on Blossom

A ready-to-deploy PHP Slim app to get you started quickly on [Blossom](https://blossom-cloud.com).

## Quick Start

```bash
# Install dependencies
composer install

# Run the app
php -S localhost:8000 -t public
```

Visit `http://localhost:8000` in your browser to see the demo application.

<details>
<summary>Additional Information</summary>

### Environment Variables
- `PORT`: Change the port (default: 8000)

### API Endpoints
```bash
# Get a greeting
curl http://localhost:8000/hello?name=John

# Echo a message
curl -X POST -H "Content-Type: application/json" \
     -d '{"message":"Hello"}' http://localhost:8000/echo
```
</details>
