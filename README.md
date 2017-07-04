# encode-decode

This small library provides a simple and consistent way to encode and decode data in php. Either due to a non-existent native solution or to wrap the native calls to provide a simpler interface and error handling.

Currently there are only 2 encoders:
- Base64Url
- Json

### Base64Url

Encode example
```
    try {
        $encoder = new Base64Url();
        $encoded = $encoder->encode("Encode/Decode library for PHP");
    } catch (EncodingException $e) {
        // handle exception
    }
    // encoded === "RW5jb2RlL0RlY29kZSBsaWJyYXJ5IGZvciBQSFA"
```

Decode example
```
    try {
        $encoder = new Base64Url();
        $decoded = $encoder->decode("RW5jb2RlL0RlY29kZSBsaWJyYXJ5IGZvciBQSFA");
    } catch (DecodingException $e) {
        // handle exception
    }
    // decoded === "Encode/Decode library for PHP"
```

### Json

Encode example
```
    try {
        $encoder = new Json();
        $encoded = $encoder->encode(["encode" => "decode"]);
    } catch (EncodingException $e) {}
```
Decode example
```
    try {
        $encoder = new Json();
        $decoded = $encoder->decode('{"encode":"decode"}');
    } catch (DecodingException $e) {}
```
By default decode will return an array, if you want to decode to an object then set assoc to false:
```
    $encoder->setAssoc(false);
```
