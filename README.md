# RandGen v1.0.0
CodeIgniter random string generator library.
This library can be used for generating ticket ID's, user ID's or anything that needs randomness :-).

## Requirements
* PHP >=5.2.4

## Installation via [Composer](http://getcomposer.org/)
* Install Composer to your project root:
    ```bash
        $ curl -sS https://getcomposer.org/installer | php
    ```
* Add a `composer.json` file to your project:
    ```json
        {
            "require":  {
                "danielthegeek/rand-gen": "dev-master"
            }
        }
    ```
* Run the Composer installer:
    ```bash
        php composer.phar install
    ```
* Copy the `Rand_gen.php` file from `path/to/project/vendor/danielthegeek/rand-gen/src` to your CI library folder normally located at `path/to/project/application/libraries`. For example:
    ```bash
        $ cd /var/www/html/example-project
        $ cp vendor/danielthegeek/rand-gen/src/Rand_gen.php application/libraries
    ```
And you're good to go.

## Usage

### Loading the library:
  ```php
    class Example extends CI_Controller 
    {
        public function myFunction()
        {
            $this->load->library('rand_gen');
        }
    }
  ```
or auto load the library if you plan on using it frequently by editing `application/config/autoload.php`
  ```php
        $autoload['libraries'] = array('rand_gen');
  ```
### Generating random string
Call the `generate()` method. The `generate()` method accepts two arguments: Length (Int)  and Type ('alpha'|'numeric'|'alpha-numeric').
Arguments | Description
------------ | -------------
Length | The length of the string to be generated
Type | The string type to be generated.

The string type value can be: 
* `alpha` - Generates a string that contains only alphabets, 
* `numeric` - Generates a string that contains only numbers or 
* `alpha-numeric` - Generates a string that contains a combination of alphabets and numbers
If a string type is not defined, the default combination will be used.
For example:
  ```php
    // Random string of 100 characters using the default combination
    $randString = $this->rand_gen->generate(100);
    echo $randString;
    
    // Random string of 30 characters containing only alphabets
    $randAlphaString = $this->rand_gen->generate(30, 'alpha');
    echo $randAlphaString;
    
    // Random string of 250 characters containing only numbers
    $randNumString = $this->rand_gen->generate(250, 'numeric');
    echo $randNumString;
    
    // Random string of 50 characters containing only alphabets and numbers
    $randAlphanumString = $this->rand_gen->generate(50, 'alpha-numeric');
    echo $randAlphanumString; 
  ```

## Contributing

1. Fork it!
2. Create your feature branch: `git checkout -b my-new-feature`
3. Commit your changes: `git commit -am 'Add some feature'`
4. Push to the branch: `git push origin my-new-feature`
5. Submit a pull request :D

## License

[MIT License](http://opensource.org/licenses/MIT)
