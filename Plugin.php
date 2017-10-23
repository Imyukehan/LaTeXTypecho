<?php

/**
 * LaTeX Plugin for Typecho
 *
 * @package LaTeX
 * @author Khan
 * @version beta
 * @link https://me.khan.moe
 */
class LaTeXTypecho_Plugin implements Typecho_Plugin_Interface
{
    
    /**
    * 激活插件方法,如果激活失败,直接抛出异常
    * 
    * @access public
    * @return void
    * @throws Typecho_Plugin_Exception
    */
    public static function activate() {
        Typecho_Plugin::factory('Widget_Archive')->header = array('LaTeXTypecho_Plugin', 'render');
        Typecho_Plugin::factory('admin/header.php')->header = array('LaTeXTypecho_Plugin', 'admin_render');
    }

    /**
    * 禁用插件方法,如果禁用失败,直接抛出异常
    * 
    * @static
    * @access public
    * @return void
    * @throws Typecho_Plugin_Exception
    */
    public static function deactivate() {}

    public static function config(Typecho_Widget_Helper_Form $form) {}

    public static function personalConfig(Typecho_Widget_Helper_Form $form) {}


    /**
     * 输出头部js
     *
     * @access public
     * @return void
     */
    public static function render() {
        echo '
    <!--引用MathJax引擎渲染LaTex公式-->
    <link rel="dns-prefetch" href="//cdn.mathjax.org" />
    <script type="text/x-mathjax-config">
        MathJax.Hub.Config({
        extensions: ["tex2jax.js"],
        jax: ["input/TeX", "output/HTML-CSS"],
        tex2jax: {
            inlineMath: [[\'$\',\'$\']],
            displayMath: [[\'$$\',\'$$\']],
            processEscapes: true
        },
        "HTML-CSS": { availableFonts: ["TeX"] }
        });
    </script>
    <script src="https://cdn.bootcss.com/mathjax/2.7.1/latest.js?config=TeX-AMS-MML_HTMLorMML"></script>';
    }
    
    
    /**
     * 输出admin部分的头部js
     *
     * @access public
     * @return void
     */
    public static function admin_render($header) {
        return $header . '
    <!--引用MathJax引擎渲染LaTex公式-->
    <link rel="dns-prefetch" href="//cdn.mathjax.org" />
    <script type="text/x-mathjax-config">
        MathJax.Hub.Config({
        extensions: ["tex2jax.js"],
        jax: ["input/TeX", "output/HTML-CSS"],
        tex2jax: {
            inlineMath: [[\'$\',\'$\']],
            displayMath: [[\'$$\',\'$$\']],
            processEscapes: true
        },
        "HTML-CSS": { availableFonts: ["TeX"] }
        });
    </script>
    <script src="https://cdn.bootcss.com/mathjax/2.7.1/latest.js?config=TeX-AMS-MML_HTMLorMML"></script>';
    }
}

?>
