<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="Content-Style-Type" content="text/css">
  <title></title>
  <meta name="Generator" content="Cocoa HTML Writer">
  <meta name="CocoaVersion" content="1671.4">
  <style type="text/css">
    p.p1 {margin: 0.0px 0.0px 0.0px 0.0px; font: 13.0px Courier; -webkit-text-stroke: #000000}
    p.p2 {margin: 0.0px 0.0px 0.0px 0.0px; font: 13.0px Courier; -webkit-text-stroke: #000000; min-height: 16.0px}
    span.s1 {font-kerning: none}
  </style>
</head>
<body>
<p class="p1"><span class="s1"># Coding Style Guide</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">This guide extends and expands on [PSR-1], the basic coding standard.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">The intent of this guide is to reduce cognitive friction when scanning code</span></p>
<p class="p1"><span class="s1">from different authors. It does so by enumerating a shared set of rules and</span></p>
<p class="p1"><span class="s1">expectations about how to format PHP code.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">The style rules herein are derived from commonalities among the various member</span></p>
<p class="p1"><span class="s1">projects. When various authors collaborate across multiple projects, it helps</span></p>
<p class="p1"><span class="s1">to have one set of guidelines to be used among all those projects. Thus, the</span></p>
<p class="p1"><span class="s1">benefit of this guide is not in the rules themselves, but in the sharing of</span></p>
<p class="p1"><span class="s1">those rules.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">The key words "MUST", "MUST NOT", "REQUIRED", "SHALL", "SHALL NOT", "SHOULD",</span></p>
<p class="p1"><span class="s1">"SHOULD NOT", "RECOMMENDED", "MAY", and "OPTIONAL" in this document are to be</span></p>
<p class="p1"><span class="s1">interpreted as described in [RFC 2119].</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">[RFC 2119]: http://www.ietf.org/rfc/rfc2119.txt</span></p>
<p class="p1"><span class="s1">[PSR-0]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md</span></p>
<p class="p1"><span class="s1">[PSR-1]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-1-basic-coding-standard.md</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">## 1. Overview</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">- Code MUST follow a "coding style guide" PSR [[PSR-1]].</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">- Code MUST use 4 spaces for indenting, not tabs.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">- There MUST NOT be a hard limit on line length; the soft limit MUST be 120</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">  </span>characters; lines SHOULD be 80 characters or less.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">- There MUST be one blank line after the `namespace` declaration, and there</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">  </span>MUST be one blank line after the block of `use` declarations.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">- Opening braces for classes MUST go on the next line, and closing braces MUST</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">  </span>go on the next line after the body.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">- Opening braces for methods MUST go on the next line, and closing braces MUST</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">  </span>go on the next line after the body.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">- Visibility MUST be declared on all properties and methods; `abstract` and</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">  </span>`final` MUST be declared before the visibility; `static` MUST be declared</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">  </span>after the visibility.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">- Control structure keywords MUST have one space after them; method and</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">  </span>function calls MUST NOT.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">- Opening braces for control structures MUST go on the same line, and closing</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">  </span>braces MUST go on the next line after the body.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">- Opening parentheses for control structures MUST NOT have a space after them,</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">  </span>and closing parentheses for control structures MUST NOT have a space before.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">### 1.1. Example</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">This example encompasses some of the rules below as a quick overview:</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">~~~php</span></p>
<p class="p1"><span class="s1">&lt;?php</span></p>
<p class="p1"><span class="s1">namespace Vendor\Package;</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">use FooInterface;</span></p>
<p class="p1"><span class="s1">use BarClass as Bar;</span></p>
<p class="p1"><span class="s1">use OtherVendor\OtherPackage\BazClass;</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">class Foo extends Bar implements FooInterface</span></p>
<p class="p1"><span class="s1">{</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>public function sampleMethod($a, $b = null)</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>{</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>if ($a === $b) {</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">            </span>bar();</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>} elseif ($a &gt; $b) {</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">            </span>$foo-&gt;bar($arg1);</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>} else {</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">            </span>BazClass::bar($arg2, $arg3);</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>}</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>}</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>final public static function bar()</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>{</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>// method body</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>}</span></p>
<p class="p1"><span class="s1">}</span></p>
<p class="p1"><span class="s1">~~~</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">## 2. General</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">### 2.1. Basic Coding Standard</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">Code MUST follow all rules outlined in [PSR-1].</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">### 2.2. Files</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">All PHP files MUST use the Unix LF (linefeed) line ending.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">All PHP files MUST end with a single blank line.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">The closing `?&gt;` tag MUST be omitted from files containing only PHP.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">### 2.3. Lines</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">There MUST NOT be a hard limit on line length.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">The soft limit on line length MUST be 120 characters; automated style checkers</span></p>
<p class="p1"><span class="s1">MUST warn but MUST NOT error at the soft limit.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">Lines SHOULD NOT be longer than 80 characters; lines longer than that SHOULD</span></p>
<p class="p1"><span class="s1">be split into multiple subsequent lines of no more than 80 characters each.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">There MUST NOT be trailing whitespace at the end of non-blank lines.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">Blank lines MAY be added to improve readability and to indicate related</span></p>
<p class="p1"><span class="s1">blocks of code.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">There MUST NOT be more than one statement per line.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">### 2.4. Indenting</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">Code MUST use an indent of 4 spaces, and MUST NOT use tabs for indenting.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">&gt; N.b.: Using only spaces, and not mixing spaces with tabs, helps to avoid</span></p>
<p class="p1"><span class="s1">&gt; problems with diffs, patches, history, and annotations. The use of spaces</span></p>
<p class="p1"><span class="s1">&gt; also makes it easy to insert fine-grained sub-indentation for inter-line</span></p>
<p class="p1"><span class="s1">&gt; alignment.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">### 2.5. Keywords and True/False/Null</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">PHP [keywords] MUST be in lower case.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">The PHP constants `true`, `false`, and `null` MUST be in lower case.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">[keywords]: http://php.net/manual/en/reserved.keywords.php</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">## 3. Namespace and Use Declarations</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">When present, there MUST be one blank line after the `namespace` declaration.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">When present, all `use` declarations MUST go after the `namespace`</span></p>
<p class="p1"><span class="s1">declaration.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">There MUST be one `use` keyword per declaration.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">There MUST be one blank line after the `use` block.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">For example:</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">~~~php</span></p>
<p class="p1"><span class="s1">&lt;?php</span></p>
<p class="p1"><span class="s1">namespace Vendor\Package;</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">use FooClass;</span></p>
<p class="p1"><span class="s1">use BarClass as Bar;</span></p>
<p class="p1"><span class="s1">use OtherVendor\OtherPackage\BazClass;</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">// ... additional PHP code ...</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">~~~</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">## 4. Classes, Properties, and Methods</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">The term "class" refers to all classes, interfaces, and traits.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">### 4.1. Extends and Implements</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">The `extends` and `implements` keywords MUST be declared on the same line as</span></p>
<p class="p1"><span class="s1">the class name.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">The opening brace for the class MUST go on its own line; the closing brace</span></p>
<p class="p1"><span class="s1">for the class MUST go on the next line after the body.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">~~~php</span></p>
<p class="p1"><span class="s1">&lt;?php</span></p>
<p class="p1"><span class="s1">namespace Vendor\Package;</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">use FooClass;</span></p>
<p class="p1"><span class="s1">use BarClass as Bar;</span></p>
<p class="p1"><span class="s1">use OtherVendor\OtherPackage\BazClass;</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">class ClassName extends ParentClass implements \ArrayAccess, \Countable</span></p>
<p class="p1"><span class="s1">{</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>// constants, properties, methods</span></p>
<p class="p1"><span class="s1">}</span></p>
<p class="p1"><span class="s1">~~~</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">Lists of `implements` MAY be split across multiple lines, where each</span></p>
<p class="p1"><span class="s1">subsequent line is indented once. When doing so, the first item in the list</span></p>
<p class="p1"><span class="s1">MUST be on the next line, and there MUST be only one interface per line.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">~~~php</span></p>
<p class="p1"><span class="s1">&lt;?php</span></p>
<p class="p1"><span class="s1">namespace Vendor\Package;</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">use FooClass;</span></p>
<p class="p1"><span class="s1">use BarClass as Bar;</span></p>
<p class="p1"><span class="s1">use OtherVendor\OtherPackage\BazClass;</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">class ClassName extends ParentClass implements</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>\ArrayAccess,</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>\Countable,</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>\Serializable</span></p>
<p class="p1"><span class="s1">{</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>// constants, properties, methods</span></p>
<p class="p1"><span class="s1">}</span></p>
<p class="p1"><span class="s1">~~~</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">### 4.2. Properties</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">Visibility MUST be declared on all properties.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">The `var` keyword MUST NOT be used to declare a property.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">There MUST NOT be more than one property declared per statement.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">Property names SHOULD NOT be prefixed with a single underscore to indicate</span></p>
<p class="p1"><span class="s1">protected or private visibility.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">A property declaration looks like the following.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">~~~php</span></p>
<p class="p1"><span class="s1">&lt;?php</span></p>
<p class="p1"><span class="s1">namespace Vendor\Package;</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">class ClassName</span></p>
<p class="p1"><span class="s1">{</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>public $foo = null;</span></p>
<p class="p1"><span class="s1">}</span></p>
<p class="p1"><span class="s1">~~~</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">### 4.3. Methods</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">Visibility MUST be declared on all methods.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">Method names SHOULD NOT be prefixed with a single underscore to indicate</span></p>
<p class="p1"><span class="s1">protected or private visibility.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">Method names MUST NOT be declared with a space after the method name. The</span></p>
<p class="p1"><span class="s1">opening brace MUST go on its own line, and the closing brace MUST go on the</span></p>
<p class="p1"><span class="s1">next line following the body. There MUST NOT be a space after the opening</span></p>
<p class="p1"><span class="s1">parenthesis, and there MUST NOT be a space before the closing parenthesis.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">A method declaration looks like the following. Note the placement of</span></p>
<p class="p1"><span class="s1">parentheses, commas, spaces, and braces:</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">~~~php</span></p>
<p class="p1"><span class="s1">&lt;?php</span></p>
<p class="p1"><span class="s1">namespace Vendor\Package;</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">class ClassName</span></p>
<p class="p1"><span class="s1">{</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>public function fooBarBaz($arg1, &amp;$arg2, $arg3 = [])</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>{</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>// method body</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>}</span></p>
<p class="p1"><span class="s1">}</span></p>
<p class="p1"><span class="s1">~~~</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">### 4.4. Method Arguments</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">In the argument list, there MUST NOT be a space before each comma, and there</span></p>
<p class="p1"><span class="s1">MUST be one space after each comma.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">Method arguments with default values MUST go at the end of the argument</span></p>
<p class="p1"><span class="s1">list.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">~~~php</span></p>
<p class="p1"><span class="s1">&lt;?php</span></p>
<p class="p1"><span class="s1">namespace Vendor\Package;</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">class ClassName</span></p>
<p class="p1"><span class="s1">{</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>public function foo($arg1, &amp;$arg2, $arg3 = [])</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>{</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>// method body</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>}</span></p>
<p class="p1"><span class="s1">}</span></p>
<p class="p1"><span class="s1">~~~</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">Argument lists MAY be split across multiple lines, where each subsequent line</span></p>
<p class="p1"><span class="s1">is indented once. When doing so, the first item in the list MUST be on the</span></p>
<p class="p1"><span class="s1">next line, and there MUST be only one argument per line.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">When the argument list is split across multiple lines, the closing parenthesis</span></p>
<p class="p1"><span class="s1">and opening brace MUST be placed together on their own line with one space</span></p>
<p class="p1"><span class="s1">between them.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">~~~php</span></p>
<p class="p1"><span class="s1">&lt;?php</span></p>
<p class="p1"><span class="s1">namespace Vendor\Package;</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">class ClassName</span></p>
<p class="p1"><span class="s1">{</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>public function aVeryLongMethodName(</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>ClassTypeHint $arg1,</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>&amp;$arg2,</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>array $arg3 = []</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>) {</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>// method body</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>}</span></p>
<p class="p1"><span class="s1">}</span></p>
<p class="p1"><span class="s1">~~~</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">### 4.5. `abstract`, `final`, and `static`</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">When present, the `abstract` and `final` declarations MUST precede the</span></p>
<p class="p1"><span class="s1">visibility declaration.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">When present, the `static` declaration MUST come after the visibility</span></p>
<p class="p1"><span class="s1">declaration.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">~~~php</span></p>
<p class="p1"><span class="s1">&lt;?php</span></p>
<p class="p1"><span class="s1">namespace Vendor\Package;</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">abstract class ClassName</span></p>
<p class="p1"><span class="s1">{</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>protected static $foo;</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>abstract protected function zim();</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>final public static function bar()</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>{</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>// method body</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>}</span></p>
<p class="p1"><span class="s1">}</span></p>
<p class="p1"><span class="s1">~~~</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">### 4.6. Method and Function Calls</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">When making a method or function call, there MUST NOT be a space between the</span></p>
<p class="p1"><span class="s1">method or function name and the opening parenthesis, there MUST NOT be a space</span></p>
<p class="p1"><span class="s1">after the opening parenthesis, and there MUST NOT be a space before the</span></p>
<p class="p1"><span class="s1">closing parenthesis. In the argument list, there MUST NOT be a space before</span></p>
<p class="p1"><span class="s1">each comma, and there MUST be one space after each comma.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">~~~php</span></p>
<p class="p1"><span class="s1">&lt;?php</span></p>
<p class="p1"><span class="s1">bar();</span></p>
<p class="p1"><span class="s1">$foo-&gt;bar($arg1);</span></p>
<p class="p1"><span class="s1">Foo::bar($arg2, $arg3);</span></p>
<p class="p1"><span class="s1">~~~</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">Argument lists MAY be split across multiple lines, where each subsequent line</span></p>
<p class="p1"><span class="s1">is indented once. When doing so, the first item in the list MUST be on the</span></p>
<p class="p1"><span class="s1">next line, and there MUST be only one argument per line.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">~~~php</span></p>
<p class="p1"><span class="s1">&lt;?php</span></p>
<p class="p1"><span class="s1">$foo-&gt;bar(</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>$longArgument,</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>$longerArgument,</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>$muchLongerArgument</span></p>
<p class="p1"><span class="s1">);</span></p>
<p class="p1"><span class="s1">~~~</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">## 5. Control Structures</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">The general style rules for control structures are as follows:</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">- There MUST be one space after the control structure keyword</span></p>
<p class="p1"><span class="s1">- There MUST NOT be a space after the opening parenthesis</span></p>
<p class="p1"><span class="s1">- There MUST NOT be a space before the closing parenthesis</span></p>
<p class="p1"><span class="s1">- There MUST be one space between the closing parenthesis and the opening</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">  </span>brace</span></p>
<p class="p1"><span class="s1">- The structure body MUST be indented once</span></p>
<p class="p1"><span class="s1">- The closing brace MUST be on the next line after the body</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">The body of each structure MUST be enclosed by braces. This standardizes how</span></p>
<p class="p1"><span class="s1">the structures look, and reduces the likelihood of introducing errors as new</span></p>
<p class="p1"><span class="s1">lines get added to the body.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">### 5.1. `if`, `elseif`, `else`</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">An `if` structure looks like the following. Note the placement of parentheses,</span></p>
<p class="p1"><span class="s1">spaces, and braces; and that `else` and `elseif` are on the same line as the</span></p>
<p class="p1"><span class="s1">closing brace from the earlier body.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">~~~php</span></p>
<p class="p1"><span class="s1">&lt;?php</span></p>
<p class="p1"><span class="s1">if ($expr1) {</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>// if body</span></p>
<p class="p1"><span class="s1">} elseif ($expr2) {</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>// elseif body</span></p>
<p class="p1"><span class="s1">} else {</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>// else body;</span></p>
<p class="p1"><span class="s1">}</span></p>
<p class="p1"><span class="s1">~~~</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">The keyword `elseif` SHOULD be used instead of `else if` so that all control</span></p>
<p class="p1"><span class="s1">keywords look like single words.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">### 5.2. `switch`, `case`</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">A `switch` structure looks like the following. Note the placement of</span></p>
<p class="p1"><span class="s1">parentheses, spaces, and braces. The `case` statement MUST be indented once</span></p>
<p class="p1"><span class="s1">from `switch`, and the `break` keyword (or other terminating keyword) MUST be</span></p>
<p class="p1"><span class="s1">indented at the same level as the `case` body. There MUST be a comment such as</span></p>
<p class="p1"><span class="s1">`// no break` when fall-through is intentional in a non-empty `case` body.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">~~~php</span></p>
<p class="p1"><span class="s1">&lt;?php</span></p>
<p class="p1"><span class="s1">switch ($expr) {</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>case 0:</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>echo 'First case, with a break';</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>break;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>case 1:</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>echo 'Second case, which falls through';</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>// no break</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>case 2:</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>case 3:</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>case 4:</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>echo 'Third case, return instead of break';</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>return;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>default:</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>echo 'Default case';</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>break;</span></p>
<p class="p1"><span class="s1">}</span></p>
<p class="p1"><span class="s1">~~~</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">### 5.3. `while`, `do while`</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">A `while` statement looks like the following. Note the placement of</span></p>
<p class="p1"><span class="s1">parentheses, spaces, and braces.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">~~~php</span></p>
<p class="p1"><span class="s1">&lt;?php</span></p>
<p class="p1"><span class="s1">while ($expr) {</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>// structure body</span></p>
<p class="p1"><span class="s1">}</span></p>
<p class="p1"><span class="s1">~~~</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">Similarly, a `do while` statement looks like the following. Note the placement</span></p>
<p class="p1"><span class="s1">of parentheses, spaces, and braces.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">~~~php</span></p>
<p class="p1"><span class="s1">&lt;?php</span></p>
<p class="p1"><span class="s1">do {</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>// structure body;</span></p>
<p class="p1"><span class="s1">} while ($expr);</span></p>
<p class="p1"><span class="s1">~~~</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">### 5.4. `for`</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">A `for` statement looks like the following. Note the placement of parentheses,</span></p>
<p class="p1"><span class="s1">spaces, and braces.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">~~~php</span></p>
<p class="p1"><span class="s1">&lt;?php</span></p>
<p class="p1"><span class="s1">for ($i = 0; $i &lt; 10; $i++) {</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>// for body</span></p>
<p class="p1"><span class="s1">}</span></p>
<p class="p1"><span class="s1">~~~</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">### 5.5. `foreach`</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">A `foreach` statement looks like the following. Note the placement of</span></p>
<p class="p1"><span class="s1">parentheses, spaces, and braces.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">~~~php</span></p>
<p class="p1"><span class="s1">&lt;?php</span></p>
<p class="p1"><span class="s1">foreach ($iterable as $key =&gt; $value) {</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>// foreach body</span></p>
<p class="p1"><span class="s1">}</span></p>
<p class="p1"><span class="s1">~~~</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">### 5.6. `try`, `catch`</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">A `try catch` block looks like the following. Note the placement of</span></p>
<p class="p1"><span class="s1">parentheses, spaces, and braces.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">~~~php</span></p>
<p class="p1"><span class="s1">&lt;?php</span></p>
<p class="p1"><span class="s1">try {</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>// try body</span></p>
<p class="p1"><span class="s1">} catch (FirstExceptionType $e) {</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>// catch body</span></p>
<p class="p1"><span class="s1">} catch (OtherExceptionType $e) {</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>// catch body</span></p>
<p class="p1"><span class="s1">}</span></p>
<p class="p1"><span class="s1">~~~</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">## 6. Closures</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">Closures MUST be declared with a space after the `function` keyword, and a</span></p>
<p class="p1"><span class="s1">space before and after the `use` keyword.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">The opening brace MUST go on the same line, and the closing brace MUST go on</span></p>
<p class="p1"><span class="s1">the next line following the body.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">There MUST NOT be a space after the opening parenthesis of the argument list</span></p>
<p class="p1"><span class="s1">or variable list, and there MUST NOT be a space before the closing parenthesis</span></p>
<p class="p1"><span class="s1">of the argument list or variable list.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">In the argument list and variable list, there MUST NOT be a space before each</span></p>
<p class="p1"><span class="s1">comma, and there MUST be one space after each comma.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">Closure arguments with default values MUST go at the end of the argument</span></p>
<p class="p1"><span class="s1">list.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">A closure declaration looks like the following. Note the placement of</span></p>
<p class="p1"><span class="s1">parentheses, commas, spaces, and braces:</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">~~~php</span></p>
<p class="p1"><span class="s1">&lt;?php</span></p>
<p class="p1"><span class="s1">$closureWithArgs = function ($arg1, $arg2) {</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>// body</span></p>
<p class="p1"><span class="s1">};</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">$closureWithArgsAndVars = function ($arg1, $arg2) use ($var1, $var2) {</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>// body</span></p>
<p class="p1"><span class="s1">};</span></p>
<p class="p1"><span class="s1">~~~</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">Argument lists and variable lists MAY be split across multiple lines, where</span></p>
<p class="p1"><span class="s1">each subsequent line is indented once. When doing so, the first item in the</span></p>
<p class="p1"><span class="s1">list MUST be on the next line, and there MUST be only one argument or variable</span></p>
<p class="p1"><span class="s1">per line.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">When the ending list (whether of arguments or variables) is split across</span></p>
<p class="p1"><span class="s1">multiple lines, the closing parenthesis and opening brace MUST be placed</span></p>
<p class="p1"><span class="s1">together on their own line with one space between them.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">The following are examples of closures with and without argument lists and</span></p>
<p class="p1"><span class="s1">variable lists split across multiple lines.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">~~~php</span></p>
<p class="p1"><span class="s1">&lt;?php</span></p>
<p class="p1"><span class="s1">$longArgs_noVars = function (</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>$longArgument,</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>$longerArgument,</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>$muchLongerArgument</span></p>
<p class="p1"><span class="s1">) {</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>// body</span></p>
<p class="p1"><span class="s1">};</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">$noArgs_longVars = function () use (</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>$longVar1,</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>$longerVar2,</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>$muchLongerVar3</span></p>
<p class="p1"><span class="s1">) {</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>// body</span></p>
<p class="p1"><span class="s1">};</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">$longArgs_longVars = function (</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>$longArgument,</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>$longerArgument,</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>$muchLongerArgument</span></p>
<p class="p1"><span class="s1">) use (</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>$longVar1,</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>$longerVar2,</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>$muchLongerVar3</span></p>
<p class="p1"><span class="s1">) {</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>// body</span></p>
<p class="p1"><span class="s1">};</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">$longArgs_shortVars = function (</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>$longArgument,</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>$longerArgument,</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>$muchLongerArgument</span></p>
<p class="p1"><span class="s1">) use ($var1) {</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>// body</span></p>
<p class="p1"><span class="s1">};</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">$shortArgs_longVars = function ($arg) use (</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>$longVar1,</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>$longerVar2,</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>$muchLongerVar3</span></p>
<p class="p1"><span class="s1">) {</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>// body</span></p>
<p class="p1"><span class="s1">};</span></p>
<p class="p1"><span class="s1">~~~</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">Note that the formatting rules also apply when the closure is used directly</span></p>
<p class="p1"><span class="s1">in a function or method call as an argument.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">~~~php</span></p>
<p class="p1"><span class="s1">&lt;?php</span></p>
<p class="p1"><span class="s1">$foo-&gt;bar(</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>$arg1,</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>function ($arg2) use ($var1) {</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>// body</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>},</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>$arg3</span></p>
<p class="p1"><span class="s1">);</span></p>
<p class="p1"><span class="s1">~~~</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">## 7. Conclusion</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">There are many elements of style and practice intentionally omitted by this</span></p>
<p class="p1"><span class="s1">guide. These include but are not limited to:</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">- Declaration of global variables and global constants</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">- Declaration of functions</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">- Operators and assignment</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">- Inter-line alignment</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">- Comments and documentation blocks</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">- Class name prefixes and suffixes</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">- Best practices</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">Future recommendations MAY revise and extend this guide to address those or</span></p>
<p class="p1"><span class="s1">other elements of style and practice.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">## Appendix A. Survey</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">In writing this style guide, the group took a survey of member projects to</span></p>
<p class="p1"><span class="s1">determine common practices.<span class="Apple-converted-space">  </span>The survey is retained herein for posterity.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">### A.1. Survey Data</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>url,http://www.horde.org/apps/horde/docs/CODING_STANDARDS,http://pear.php.net/manual/en/standards.php,http://solarphp.com/manual/appendix-standards.style,http://framework.zend.com/manual/en/coding-standard.html,https://symfony.com/doc/2.0/contributing/code/standards.html,http://www.ppi.io/docs/coding-standards.html,https://github.com/ezsystems/ezp-next/wiki/codingstandards,http://book.cakephp.org/2.0/en/contributing/cakephp-coding-conventions.html,https://github.com/UnionOfRAD/lithium/wiki/Spec%3A-Coding,http://drupal.org/coding-standards,http://code.google.com/p/sabredav/,http://area51.phpbb.com/docs/31x/coding-guidelines.html,https://docs.google.com/a/zikula.org/document/edit?authkey=CPCU0Us&amp;hgd=1&amp;id=1fcqb93Sn-hR9c0mkN6m_tyWnmEvoswKBtSc0tKkZmJA,http://www.chisimba.com,n/a,https://github.com/Respect/project-info/blob/master/coding-standards-sample.php,n/a,Object Calisthenics for PHP,http://doc.nette.org/en/coding-standard,http://flow3.typo3.org,https://github.com/propelorm/Propel2/wiki/Coding-Standards,http://developer.joomla.org/coding-standards.html</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>voting,yes,yes,yes,yes,yes,yes,yes,yes,yes,yes,yes,yes,yes,yes,yes,no,no,no,?,yes,no,yes</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>indent_type,4,4,4,4,4,tab,4,tab,tab,2,4,tab,4,4,4,4,4,4,tab,tab,4,tab</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>line_length_limit_soft,75,75,75,75,no,85,120,120,80,80,80,no,100,80,80,?,?,120,80,120,no,150</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>line_length_limit_hard,85,85,85,85,no,no,no,no,100,?,no,no,no,100,100,?,120,120,no,no,no,no</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>class_names,studly,studly,studly,studly,studly,studly,studly,studly,studly,studly,studly,lower_under,studly,lower,studly,studly,studly,studly,?,studly,studly,studly</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>class_brace_line,next,next,next,next,next,same,next,same,same,same,same,next,next,next,next,next,next,next,next,same,next,next</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>constant_names,upper,upper,upper,upper,upper,upper,upper,upper,upper,upper,upper,upper,upper,upper,upper,upper,upper,upper,upper,upper,upper,upper</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>true_false_null,lower,lower,lower,lower,lower,lower,lower,lower,lower,upper,lower,lower,lower,upper,lower,lower,lower,lower,lower,upper,lower,lower</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>method_names,camel,camel,camel,camel,camel,camel,camel,camel,camel,camel,camel,lower_under,camel,camel,camel,camel,camel,camel,camel,camel,camel,camel</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>method_brace_line,next,next,next,next,next,same,next,same,same,same,same,next,next,same,next,next,next,next,next,same,next,next</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>control_brace_line,same,same,same,same,same,same,next,same,same,same,same,next,same,same,next,same,same,same,same,same,same,next</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>control_space_after,yes,yes,yes,yes,yes,no,yes,yes,yes,yes,no,yes,yes,yes,yes,yes,yes,yes,yes,yes,yes,yes</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>always_use_control_braces,yes,yes,yes,yes,yes,yes,no,yes,yes,yes,no,yes,yes,yes,yes,no,yes,yes,yes,yes,yes,yes</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>else_elseif_line,same,same,same,same,same,same,next,same,same,next,same,next,same,next,next,same,same,same,same,same,same,next</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>case_break_indent_from_switch,0/1,0/1,0/1,1/2,1/2,1/2,1/2,1/1,1/1,1/2,1/2,1/1,1/2,1/2,1/2,1/2,1/2,1/2,0/1,1/1,1/2,1/2</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>function_space_after,no,no,no,no,no,no,no,no,no,no,no,no,no,no,no,no,no,no,no,no,no,no</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>closing_php_tag_required,no,no,no,no,no,no,no,no,yes,no,no,no,no,yes,no,no,no,no,no,yes,no,no</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>line_endings,LF,LF,LF,LF,LF,LF,LF,LF,?,LF,?,LF,LF,LF,LF,?,,LF,?,LF,LF,LF</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>static_or_visibility_first,static,?,static,either,either,either,visibility,visibility,visibility,either,static,either,?,visibility,?,?,either,either,visibility,visibility,static,?</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>control_space_parens,no,no,no,no,no,no,yes,no,no,no,no,no,no,yes,?,no,no,no,no,no,no,no</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>blank_line_after_php,no,no,no,no,yes,no,no,no,no,yes,yes,no,no,yes,?,yes,yes,no,yes,no,yes,no</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>class_method_control_brace,next/next/same,next/next/same,next/next/same,next/next/same,next/next/same,same/same/same,next/next/next,same/same/same,same/same/same,same/same/same,same/same/same,next/next/next,next/next/same,next/same/same,next/next/next,next/next/same,next/next/same,next/next/same,next/next/same,same/same/same,next/next/same,next/next/next</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">### A.2. Survey Legend</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">`indent_type`:</span></p>
<p class="p1"><span class="s1">The type of indenting. `tab` = "Use a tab", `2` or `4` = "number of spaces"</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">`line_length_limit_soft`:</span></p>
<p class="p1"><span class="s1">The "soft" line length limit, in characters. `?` = not discernible or no response, `no` means no limit.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">`line_length_limit_hard`:</span></p>
<p class="p1"><span class="s1">The "hard" line length limit, in characters. `?` = not discernible or no response, `no` means no limit.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">`class_names`:</span></p>
<p class="p1"><span class="s1">How classes are named. `lower` = lowercase only, `lower_under` = lowercase with underscore separators, `studly` = StudlyCase.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">`class_brace_line`:</span></p>
<p class="p1"><span class="s1">Does the opening brace for a class go on the `same` line as the class keyword, or on the `next` line after it?</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">`constant_names`:</span></p>
<p class="p1"><span class="s1">How are class constants named? `upper` = Uppercase with underscore separators.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">`true_false_null`:</span></p>
<p class="p1"><span class="s1">Are the `true`, `false`, and `null` keywords spelled as all `lower` case, or all `upper` case?</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">`method_names`:</span></p>
<p class="p1"><span class="s1">How are methods named? `camel` = `camelCase`, `lower_under` = lowercase with underscore separators.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">`method_brace_line`:</span></p>
<p class="p1"><span class="s1">Does the opening brace for a method go on the `same` line as the method name, or on the `next` line?</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">`control_brace_line`:</span></p>
<p class="p1"><span class="s1">Does the opening brace for a control structure go on the `same` line, or on the `next` line?</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">`control_space_after`:</span></p>
<p class="p1"><span class="s1">Is there a space after the control structure keyword?</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">`always_use_control_braces`:</span></p>
<p class="p1"><span class="s1">Do control structures always use braces?</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">`else_elseif_line`:</span></p>
<p class="p1"><span class="s1">When using `else` or `elseif`, does it go on the `same` line as the previous closing brace, or does it go on the `next` line?</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">`case_break_indent_from_switch`:</span></p>
<p class="p1"><span class="s1">How many times are `case` and `break` indented from an opening `switch` statement?</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">`function_space_after`:</span></p>
<p class="p1"><span class="s1">Do function calls have a space after the function name and before the opening parenthesis?</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">`closing_php_tag_required`:</span></p>
<p class="p1"><span class="s1">In files containing only PHP, is the closing `?&gt;` tag required?</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">`line_endings`:</span></p>
<p class="p1"><span class="s1">What type of line ending is used?</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">`static_or_visibility_first`:</span></p>
<p class="p1"><span class="s1">When declaring a method, does `static` come first, or does the visibility come first?</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">`control_space_parens`:</span></p>
<p class="p1"><span class="s1">In a control structure expression, is there a space after the opening parenthesis and a space before the closing parenthesis? `yes` = `if ( $expr )`, `no` = `if ($expr)`.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">`blank_line_after_php`:</span></p>
<p class="p1"><span class="s1">Is there a blank line after the opening PHP tag?</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">`class_method_control_brace`:</span></p>
<p class="p1"><span class="s1">A summary of what line the opening braces go on for classes, methods, and control structures.</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">### A.3. Survey Results</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>indent_type:</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>tab: 7</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>2: 1</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>4: 14</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>line_length_limit_soft:</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>?: 2</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>no: 3</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>75: 4</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>80: 6</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>85: 1</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>100: 1</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>120: 4</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>150: 1</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>line_length_limit_hard:</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>?: 2</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>no: 11</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>85: 4</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>100: 3</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>120: 2</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>class_names:</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>?: 1</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>lower: 1</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>lower_under: 1</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>studly: 19</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>class_brace_line:</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>next: 16</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>same: 6</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>constant_names:</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>upper: 22</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>true_false_null:</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>lower: 19</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>upper: 3</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>method_names:</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>camel: 21</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>lower_under: 1</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>method_brace_line:</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>next: 15</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>same: 7</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>control_brace_line:</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>next: 4</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>same: 18</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>control_space_after:</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>no: 2</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>yes: 20</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>always_use_control_braces:</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>no: 3</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>yes: 19</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>else_elseif_line:</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>next: 6</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>same: 16</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>case_break_indent_from_switch:</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>0/1: 4</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>1/1: 4</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>1/2: 14</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>function_space_after:</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>no: 22</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>closing_php_tag_required:</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>no: 19</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>yes: 3</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>line_endings:</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>?: 5</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>LF: 17</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>static_or_visibility_first:</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>?: 5</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>either: 7</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>static: 4</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>visibility: 6</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>control_space_parens:</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>?: 1</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>no: 19</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>yes: 2</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>blank_line_after_php:</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>?: 1</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>no: 13</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>yes: 8</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>class_method_control_brace:</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>next/next/next: 4</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>next/next/same: 11</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>next/same/same: 1</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>same/same/same: 6</span></p>
</body>
</html>
