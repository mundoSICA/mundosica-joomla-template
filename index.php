<?php
/**
 * @package                Joomla.Site
 * @subpackage	Templates.sica
 * @copyright        Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license                GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

// check modules
$showRightColumn        = ($this->countModules('position-3') or $this->countModules('position-6') or $this->countModules('position-8'));
$showbottom                        = ($this->countModules('position-9') or $this->countModules('position-10') or $this->countModules('position-11'));
$showleft                        = ($this->countModules('position-4') or $this->countModules('position-7') or $this->countModules('position-5'));

if ($showRightColumn==0 and $showleft==0) {
        $showno = 0;
}

JHtml::_('behavior.framework', true);

// get params
$color              = $this->params->get('templatecolor');
$logo               = $this->params->get('logo');
$navposition        = $this->params->get('navposition');
$app                = JFactory::getApplication();
$doc				= JFactory::getDocument();
$templateparams     = $app->getTemplate(true)->params;

$doc->addScript($this->baseurl.'/templates/'.$this->template.'/javascript/md_stylechanger.js', 'text/javascript', true);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
        <head>
                <jdoc:include type="head" />
                <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/system.css" type="text/css" />
                <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/position.css" type="text/css" media="screen,projection" />
                <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/layout.css" type="text/css" media="screen,projection" />
                <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/print.css" type="text/css" media="print" />
<?php
        $files = JHtml::_('stylesheet', 'templates/'.$this->template.'/css/general.css', null, false, true);
        if ($files):
                if (!is_array($files)):
                        $files = array($files);
                endif;
                foreach($files as $file):
?>
                <link rel="stylesheet" href="<?php echo $file;?>" type="text/css" />
<?php
                 endforeach;
        endif;
?>
                <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/<?php echo htmlspecialchars($color); ?>.css" type="text/css" />
<?php			if ($this->direction == 'rtl') : ?>
                <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/template_rtl.css" type="text/css" />
<?php				if (file_exists(JPATH_SITE . '/templates/sica/css/' . $color . '_rtl.css')) :?>
                <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/<?php echo $color ?>_rtl.css" type="text/css" />
<?php				endif; ?>
<?php			endif; ?>
                <!--[if lte IE 6]>
                <link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/ieonly.css" rel="stylesheet" type="text/css" />

                <?php if ($color=="personal") : ?>
                <style type="text/css">
                #line
                {      width:98% ;
                }
                .logoheader
                {
                        height:200px;

                }
                #header ul.menu
                {
                display:block !important;
                      width:98.2% ;


                }
                 </style>
                <?php endif;  ?>
                <![endif]-->
                <!--[if IE 7]>
                        <link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/ie7only.css" rel="stylesheet" type="text/css" />
                <![endif]-->
                <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/javascript/hide.js"></script>

                <script type="text/javascript">
                        var big ='<?php echo (int)$this->params->get('wrapperLarge');?>%';
                        var small='<?php echo (int)$this->params->get('wrapperSmall'); ?>%';
                        var altopen='<?php echo JText::_('TPL_SICA_ALTOPEN', true); ?>';
                        var altclose='<?php echo JText::_('TPL_SICA_ALTCLOSE', true); ?>';
                        var bildauf='<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/plus.png';
                        var bildzu='<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/minus.png';
                        var rightopen='<?php echo JText::_('TPL_SICA_TEXTRIGHTOPEN', true); ?>';
                        var rightclose='<?php echo JText::_('TPL_SICA_TEXTRIGHTCLOSE'); ?>';
                        var fontSizeTitle='<?php echo JText::_('TPL_SICA_FONTSIZE'); ?>';
                        var bigger='<?php echo JText::_('TPL_SICA_BIGGER'); ?>';
                        var reset='<?php echo JText::_('TPL_SICA_RESET'); ?>';
                        var smaller='<?php echo JText::_('TPL_SICA_SMALLER'); ?>';
                        var biggerTitle='<?php echo JText::_('TPL_SICA_INCREASE_SIZE'); ?>';
                        var resetTitle='<?php echo JText::_('TPL_SICA_REVERT_STYLES_TO_DEFAULT'); ?>';
                        var smallerTitle='<?php echo JText::_('TPL_SICA_DECREASE_SIZE'); ?>';
                </script>
<script language="Javascript"  type="text/javascript">
	window.addEvent('domready', function() {

  var status = {
    'true': 'open',
    'false': 'close'
  };

  // -- vertical

  var myVerticalSlide = new Fx.Slide('vertical_slide');

  $('v_slidein').addEvent('click', function(event){
    event.stop();
    myVerticalSlide.slideIn();
  });

  $('v_slideout').addEvent('click', function(event){
    event.stop();
    myVerticalSlide.slideOut();
  });

  $('v_toggle').addEvent('click', function(event){
    event.stop();
    myVerticalSlide.toggle();
  });

  $('v_hide').addEvent('click', function(event){
    event.stop();
    myVerticalSlide.hide();
    $('vertical_status').set('text', status[myVerticalSlide.open]);
  });

  $('v_show').addEvent('click', function(event){
    event.stop();
    myVerticalSlide.show();
    $('vertical_status').set('text', status[myVerticalSlide.open]);
  });

  // When Vertical Slide ends its transition, we check for its status
  // note that complete will not affect 'hide' and 'show' methods
  myVerticalSlide.addEvent('complete', function() {
    $('vertical_status').set('text', status[myVerticalSlide.open]);
  });


  // -- horizontal
  var myHorizontalSlide = new Fx.Slide('horizontal_slide', {mode: 'horizontal'});

  $('h_slidein').addEvent('click', function(event){
    event.stop();
    myHorizontalSlide.slideIn();
  });

  $('h_slideout').addEvent('click', function(event){
    event.stop();
    myHorizontalSlide.slideOut();
  });

  $('h_toggle').addEvent('click', function(event){
    event.stop();
    myHorizontalSlide.toggle();
  });

  $('h_hide').addEvent('click', function(event){
    event.stop();
    myHorizontalSlide.hide();
    $('horizontal_status').set('text', status[myHorizontalSlide.open]);
  });

  $('h_show').addEvent('click', function(event){
    event.stop();
    myHorizontalSlide.show();
    $('horizontal_status').set('text', status[myHorizontalSlide.open]);
  });

  // When Horizontal Slide ends its transition, we check for its status
  // note that complete will not affect 'hide' and 'show' methods
  myHorizontalSlide.addEvent('complete', function() {
    $('horizontal_status').set('text', status[myHorizontalSlide.open]);
  });
});
</script>
        </head>

        <body>

<div id="all">
        <div id="back">
                <div id="header">
						<a href="<?php echo $this->baseurl ?>" title='Inicio' id='logoSica'></a>
								<h1 id="logo">
                                        <?php if ($logo): ?>
                                        <?php endif;?>
                                        <?php if (!$logo ): ?>
                                        <?php echo htmlspecialchars($templateparams->get('sitetitle'));?>
                                        <?php endif; ?>
                                        <span class="header1">
											<?php echo htmlspecialchars($templateparams->get('sitedescription'));?>
                                </span></h1>
                                <div id="logoheader">
                                        <img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/slide/banner_pagina_principal.png" alt="" title="" />
                                </div><!-- end logoheader -->
                                <div class="comentarios_clientes">
														<h3>Nuestros clientes dicen</h3>
															<table class="contentpaneopen">
										<tbody><tr>
											<td width="100%" class="contentheading">
													<a class="contentpagetitle" href="#">
													Miguel Angel Ramos Jarquín</a>
												</td>

										</tr>
										</tbody></table>
										<table class="contentpaneopen">
											<tbody><tr>
												<td valign="top"><p><span style="font-size: 10pt;"><span style="color: rgb(51, 51, 153);"><span style="font-family: book antiqua,palatino;">Comentarios.: Excelente empresa, profesionales y  especialistas en su materia. La calidad humana los caracteriza en su  proyectos y en su atención al cliente. La facilidad para atender las  demandas de los clientes.</span></span></span></p>
										<p><span style="font-size: 10pt;"><span style="color: rgb(51, 51, 153);"><span style="font-family: book antiqua,palatino;">Empresa : Universidad Anáhuac Oaxaca<br/> Cargo en la organización:  catedrático y Auxiliar en los Laboratorios de Radio y TV</span></span></span></p></td>
											</tr>

											<tr>
												<td valign="top">

													</td>
											 </tr>
										</tbody></table>
							</div> <!-- end comentarios_clientes -->
                                        <ul class="skiplinks">
                                                <li><a href="#main" class="u2"><?php echo JText::_('TPL_SICA_SKIP_TO_CONTENT'); ?></a></li>
                                                <li><a href="#nav" class="u2"><?php echo JText::_('TPL_SICA_JUMP_TO_NAV'); ?></a></li>
                                            <?php if($showRightColumn ):?>
                                            <li><a href="#additional" class="u2"><?php echo JText::_('TPL_SICA_JUMP_TO_INFO'); ?></a></li>
                                           <?php endif; ?>
                                        </ul>
                                        <h2 class="unseen"><?php echo JText::_('TPL_SICA_NAV_VIEW_SEARCH'); ?></h2>
                                        <h3 class="unseen"><?php echo JText::_('TPL_SICA_NAVIGATION'); ?></h3>
                                        <jdoc:include type="modules" name="position-1" />
                                        <div id="line">
                                        <div id="fontsize"></div>
                                        <h3 class="unseen"><?php echo JText::_('TPL_SICA_SEARCH'); ?></h3>
                                        <jdoc:include type="modules" name="position-0" />
                                        </div> <!-- end line -->


                        </div><!-- end header -->
                        <div id="<?php echo $showRightColumn ? 'contentarea2' : 'contentarea'; ?>">
                                        <div id="breadcrumbs">

                                                        <jdoc:include type="modules" name="position-2" />

                                        </div>

                                        <?php if ($navposition=='left' and $showleft) : ?>


                                                        <div class="left1 <?php if ($showRightColumn==NULL){ echo 'leftbigger';} ?>" id="nav">
                                                   <jdoc:include type="modules" name="position-7" style="beezDivision" headerLevel="3" />
                                                                <jdoc:include type="modules" name="position-4" style="beezHide" headerLevel="3" state="0 " />
                                                                <jdoc:include type="modules" name="position-5" style="beezTabs" headerLevel="2"  id="3" />


                                                        </div><!-- end navi -->
               <?php endif; ?>

                                        <div id="<?php echo $showRightColumn ? 'wrapper' : 'wrapper2'; ?>" <?php if (isset($showno)){echo 'class="shownocolumns"';}?>>

                                                <div id="main">

                                                <?php if ($this->countModules('position-12')): ?>
                                                        <div id="top"><jdoc:include type="modules" name="position-12"   />
                                                        </div>
                                                <?php endif; ?>

                                                        <jdoc:include type="message" />
                                                        <jdoc:include type="component" />

                                                </div><!-- end main -->

                                        </div><!-- end wrapper -->

                                <?php if ($showRightColumn) : ?>
                                        <h2 class="unseen">
                                                <?php echo JText::_('TPL_SICA_ADDITIONAL_INFORMATION'); ?>
                                        </h2>
                                        <div id="close">
                                                <a href="#" onclick="auf('right')">
                                                        <span id="bild">
                                                                <?php echo JText::_('TPL_SICA_TEXTRIGHTCLOSE'); ?></span></a>
                                        </div>


                                        <div id="right">
                                                <a id="additional"></a>
                                                <jdoc:include type="modules" name="position-6" style="beezDivision" headerLevel="3"/>
                                                <jdoc:include type="modules" name="position-8" style="beezDivision" headerLevel="3"  />
                                                <jdoc:include type="modules" name="position-3" style="beezDivision" headerLevel="3"  />
                                        </div><!-- end right -->
                                        <?php endif; ?>

                        <?php if ($navposition=='center' and $showleft) : ?>

                                        <div class="left <?php if ($showRightColumn==NULL){ echo 'leftbigger';} ?>" id="nav" >

                                                <jdoc:include type="modules" name="position-7"  style="beezDivision" headerLevel="3" />
                                                <jdoc:include type="modules" name="position-4" style="beezHide" headerLevel="3" state="0 " />
                                                <jdoc:include type="modules" name="position-5" style="beezTabs" headerLevel="2"  id="3" />


                                        </div><!-- end navi -->
                   <?php endif; ?>

                                <div class="wrap"></div>

                                </div> <!-- end contentarea -->

                        </div><!-- back -->

                </div><!-- all -->

                <div id="footer-outer">
                        <?php if ($showbottom) : ?>
                        <div id="footer-inner">

                                <div id="bottom">
                                        <div class="box box1"> <jdoc:include type="modules" name="position-9" style="beezDivision" headerlevel="3" /></div>
                                        <div class="box box2"> <jdoc:include type="modules" name="position-10" style="beezDivision" headerlevel="3" /></div>
                                        <div class="box box3"> <jdoc:include type="modules" name="position-11" style="beezDivision" headerlevel="3" /></div>
                                </div>


                        </div>
                                <?php endif ; ?>

                        <div id="footer-sub">


                                <div id="footer">

                                        <jdoc:include type="modules" name="position-14" />
                                        <p>
                                                <?php echo JText::_('TPL_SICA_POWERED_BY');?> <a href="http://www.joomla.org/">Joomla!&#174;</a>
                                        </p>


                                </div><!-- end footer -->

                        </div>

                </div>
				<jdoc:include type="modules" name="debug" />
        </body>
</html>
