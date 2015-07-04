# phpTo7aid
Tool to find, and possibly fix, backward incompatible changes in your existing codebase when upgrading to or preparing for PHP7

About
-----
The goal of phpTo7aid is to identify PHP 5 code that will not work in PHP 7. It tries to aid you as much as possible in resolving this issues, by either providing the exact solution or giving hints on how to solve the issue.


##### Versioning #####
phpTo7aid uses [Semantic Versioning 2](http://semver.org/) as guideline for new versions.


##### License #####
phpTo7aid is licensed under the MIT License - see the `LICENSE` file for details.


##### Authors #####
[Giso Stallenberg](https://github.com/gisostallenberg/)


##### Backward Incompatible Changes in PHP 7 #####

See [PHP 7 UPGRADING](https://github.com/php/php-src/blob/php-7.0.0alpha2/UPGRADING)

###### Implemented ######

###### Will not be implemented (including reason) ######

###### Not yet implemented ######
* Indirect variable, property and method references are now interpreted with left-to-right semantics.
* The global keyword now only accepts simple variables
* Parentheses around variables or function calls no longer have any influence on behavior
* Array elements or object properties that are automatically created during by-reference assignments will now result in a different order
* list() will no longer assign variables in reverse order
* Empty list() assignments are no longer allowed
* list() no longer supports unpacking strings
* Iteration with foreach() no longer has any effect on the internal array pointer
* When iterating arrays by-value, foreach will now always operate on a copy of the array, as such changes to the array during iteration will not influence iteration behavior
* When iterating arrays by-reference, modifications to the array will continue to influence the iteration.
* Iteration of plain (non-Traversable) objects by-value or by-reference will behave like by-reference iteration of arrays
* It is no longer possible to define two function parameters with the same name.
* The func_get_arg() and func_get_args() functions will no longer return the original value that was passed to a parameter and will instead provide the current value (which might have been modified).
* Exception backtraces will no longer display the original value that was passed to a function and show the modified value instead
* Invalid octal literals (containing digits larger than 7) now produce compile errors.
* Bitwise shifts by negative numbers will now throw a warning and return false
* Left bitwise shifts by a number of bits beyond the bit width of an integer will always result in 0
* Right bitwise shifts by a number of bits beyond the bit width of an integer will always result in 0 or -1 (depending on sign)
* Strings that contain hexadecimal numbers are no longer considered to be numeric and don't receive special treatment anymore.
* Due to the addition of the Unicode Codepoint Escape Syntax for double-quoted strings and heredocs, "\u{" followed by an invalid sequence will now result in an error
* There are now two exception classes: Exception and Error. Both classes implement a new interface Throwable.
* Some fatal errors and recoverable fatal errors now throw an Error instead
* Parser errors now generate a ParseError that extends Error
* Constructors of internal classes will now always throw an exception on failure
* The error level of some E_STRICT notices has been changed
* Removed support for static calls to non-static calls form an incompatible $this context.
* It is no longer possible to use the following class, interface and trait names (case-insensitive): bool, int, float, string, null, false, true
* The following class, interface and trait names are now reserved for future use, but do not yet throw an error when used: resource, object, mixed, numeric
* The yield language construct no longer requires parentheses when used in an expression context
* Removed ASP (<%) and script (<script language=php>) tags
* Removed support for assigning the result of new by reference* Removed support for scoped calls to non-static methods from an incompatible $this context
* Removed support for #-style comments in ini files
* $HTTP_RAW_POST_DATA is no longer available
* call_user_method() and call_user_method_array() no longer exists
* ob_start() no longer issues an E_ERROR, but instead an E_RECOVERABLE_ERROR in case an output buffer is created in an output buffer handler
* Improved zend_qsort(using hybrid sorting algo) for better performance, and also renamed zend_qsort to zend_sort.
* Added stable sorting algo zend_insert_sort
* Removed dl() function on fpm-fcgi
* setcookie() with an empty cookie name now issues a WARNING and doesn't send an empty set-cookie header line anymore
* Removed support for disabling the CURLOPT_SAFE_UPLOAD option. All curl file uploads must use the curl_file / CURLFile APIs
* Removed $is_dst parameter from mktime() and gmmktime()
* dba_delete() now returns false if the key was not found for the inifile handler, too.
* GMP requires libgmp version 4.2 or newer now
* gmp_setbit() and gmp_clrbit() now return FALSE for negative indices, making them consistent with other GMP functions
* Removed deprecated aliases datefmt_set_timezone_id() and IntlDateFormatter::setTimeZoneID().
* Added LIBXML_BIGLINES parser option
* Removed deprecated mcrypt_generic_end() alias in favor of mcrypt_generic_deinit()
* Removed deprecated mcrypt_ecb(), mcrypt_cbc(), mcrypt_cfb() and mcrypt_ofb() functions in favor of mcrypt_encrypt() and mcrypt_decrypt() with an MCRYPT_MODE_* flag
* session_start() accepts all INI settings as array. e.g. ['cache_limiter'=>'private'] sets session.cache_limiter=private. It also supports 'read_and_close' which closes session data immediately after read data
* Save handler accepts validate_sid(), update_timestamp() which validates session ID existence, updates timestamp of session data
* SessionUpdateTimestampHandlerInterface is added. validateSid(), updateTimestamp() is defined in the interface.
* session.lazy_write(default=On) INI setting enables only write session data when session data is updated.
* Removed opcache.load_comments configuration directive
* Removed the "rsa_key_size" SSL context option in favor of automatically setting the appropriate size given the negotiated crypto algorithm
* Removed "CN_match" and "SNI_server_name" SSL context options.
* Removed support for /e (PREG_REPLACE_EVAL) modifier
* Removed PGSQL_ATTR_DISABLE_NATIVE_PREPARED_STATEMENT attribute in favor of ATTR_EMULATE_PREPARES
* Removed string category support in setlocale()
* Removed set_magic_quotes_runtime() and its alias magic_quotes_runtime()
* Rejected RFC 7159 incompatible number formats in json_decode string - top level (07, 0xff, .1, -.1) and all levels ([1.], [1.e1])
* Calling json_decode with 1st argument equal to empty PHP string or value that after casting to string is empty string (NULL, FALSE) results in JSON syntax error
* Removed set_socket_blocking() in favor of its alias stream_set_blocking()
* Removed xsl.security_prefs ini option. Use XsltProcessor::setSecurityPrefs() instead

