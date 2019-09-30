## Documentation
### Setting Up Environment
In your source code directory, perform the followings:

Install dependencies:

```bash
composer install
npm install
```

Rebuild database:

```bash
php artisan migrate:refresh --seed
```

### Development
During development run: 
```bash
npm run watch
```
This builds the system on every save (CTRL+S), ensuring the latest changes is applied.
