<?php
require_once('homepage_header.php');
$NAV = 'x11';
?>

<h2>My X11 Programs</h2>

<p>What follows is a list and a short description of each X program I've
   worked on or developed from scratch. Please see the appropriate sidebar
   links for more detailed info (and possibly some documentation). This list
   is in roughly chronological order.</p>

<h2>PyTyle 1</h2>
<p><a href="http://sourceforge.net/projects/pytyle/">PyTyle 1</a> was my first 
   project using X. It's written in Python and uses the
   <a href="http://python-xlib.sourceforge.net/">Python X Library</a>. PyTyle 1
   is meant to be a daemon-like program that provides automatic tiling features
   to window managers that lack tiling support. That is, PyTyle 1 <em>isn't</em>
   a window manager, but a tool that works <em>with</em> the window manager.
   It's primarily supported under Openbox, but others have reported success
   with other window managers.</p>

<h2>PyTyle 2</h2>
<p><a href="http://code.google.com/p/pytyle/">PyTyle 2</a> is PyTyle 1's
   successor. It's also written in Python, but instead of using the Python
   X Library, it uses the
   <a href="http://cgit.freedesktop.org/xcb/xpyb/">X Python Binding</a> (xpyb).
   xpyb achieves a similar goal as the Python X Library, but it does so
   by following in XCB's footsteps. Namely, the code that implements the
   X protocol is automatically generated from an XML protocol description. I
   switched to xpyb because I was promised something that was faster&mdash;not
   that the Python X Library was lacking in speed. xpyb is also actively
   maintained.</p>

<p>PyTyle 2 vastly extended the number of features found in PyTyle 1.
   Particularly, it has experimental manual tiling support (like that found
   in <a href="http://aerosuidae.net/musca.html">Musca</a>) and a more robust
   configuration. PyTyle 2 also included supported to remove the window
   manager's decorations and draw skinny borders around such undecorated
   windows.</p>

<p>As a result, PyTyle 2's code base is extremely bloated. Partly because
   manual tiling was so difficult to implement (without being a window manager)
   and partly because xpyb was so low level that it required a lot of
   supporting code. PyTyle 2 is also a memory hog.</p>

<h2>xpybutil</h2>
<p><a href="https://github.com/BurntSushi/xpybutil">xpybutil</a> is a utility
   library for accomplishing common X tasks in Python (biased toward tasks
   commonly found in window managers). It operates as a layer of abstraction
   over xpyb and provides modules for easy access to EWMH and ICCCM information,
   key and mouse bindings, xinerama information, window moving/resizing, and
   some limited support for drawing images to windows using
   <a href="http://www.pythonware.com/products/pil/">PIL</a>.</p>

<p>I consider xpybutil a success, and I still use it today. There is also a
   nearly complete set of
   <?=aurl('API documentation', 'xpybutil/docs')?>.</p>

<h2>pyndow</h2>
<p><a href="https://github.com/BurntSushi/pyndow">pyndow</a> is a window
   manager written in Python that I never finished. It was meant to support
   both floating and tiling placement strategies (and do them both well), and
   also provide <em>good</em> support for multiple heads.</p>

<p>This was my first Python project of this size, and I discovered that
   writing good code in Python in such a big project is actually quite
   difficult. Invariably, I considered this project a failure because of two
   things: 1) an over-engineered design that ended up crumbling beneathe itself
   by the time I got around to implementing a workable workspace model and 2)
   memory usage in Python was unacceptable. With regards to (2), I don't claim
   that there was no way I could keep memory usage down&mdash;just that it
   wasn't worth trying. It was particularly difficult given the amount of
   images pyndow has to create (frame decorations and window icons).</p>

<p>Note that pyndow uses an older version of xpybutil than what is active
   in the repositories. I probably should have tagged the last commit of
   xpybutil that worked with pyndow, but I didn't. The changes are mostly
   related to API differences.</p>

<h2>Openbox Multihead</h2>
<p><a href="https://github.com/BurntSushi/openbox-multihead">Openbox Multihead</a>
   is a fork of the popular <a href="http://openbox.org">Openbox</a> window
   manager that has (in my opinion) proper support for multiple heads.</p>

<p>The biggest change is in the workspace model: different workspaces are
   visible on each monitor, as opposed to one workspace being stretched across
   all monitors. I found the old model to be insufferable on
   <a href="https://bbs.archlinux.org/viewtopic.php?pid=1080324">three monitors</a>.
   The new model was inspired by <a href="http://xmonad.org/">Xmonad</a>, which
   also uses the workspace-per-monitor model.</p>

<p>To my knowledge, there are few window managers that implement the
   workspace-per-monitor model&mdash;particularly floating window managers.
   Several tiling window managers implement it, but in a slightly different
   way: while different workspaces can be on different monitors, a workspace
   can only <em>ever</em> be shown on a particular monitor.
   The approach I like (and the one that is found in Openbox Multihead and
   Xmonad), is to have a set of workspaces and any one workspace can be
   viewable on any monitor.</p>

<p>Using a workspace-per-monitor model has its down-sides. Namely, it breaks
   <a href="http://standards.freedesktop.org/wm-spec/wm-spec-latest.html">EWMH</a>
   assumption that one and only one workspace is viewable at any time.
   The consequences of which are that pages no longer work correctly, since
   they all assume only one workspace is viewable.</p>

<h2>pager-multihead</h2>
<p><a href="https://github.com/BurntSushi/pager-multihead">pager-multihead</a>
   is the remedy to the fact that the workspace-per-monitor model breaks an
   EWMH assumption. Namely, it works with window managers that can show
   more than one workspace at a time.</p>

<p>pager-multihead has a bit more magic, though. It is configured in Python
   and has the full power of xpybutil at the ready. Because of this, one
   can get
   <a href="https://github.com/BurntSushi/pager-multihead/blob/master/keymousebind.py">rather creative</a>
   with the keybindings available. In particular, under Openbox Multihead,
   my configuration file implements dynamic workspaces. Dynamic workspaces
   is an approach that diverges from the traditional static workspace setup in
   that workspaces can be created and destroyed at a whim. This makes workspaces
   much more task oriented; even when you can't predict what those tasks are
   ahead of time.</p>

<h2>pytyle3</h2>
<p><a href="https://github.com/BurntSushi/pytyle3">pytyle3</a> was developed
   using xpybutil and with a limited feature set. My primary motivation for
   making pytyle3 was that Openbox Multihead no longer works with PyTyle 1
   and PyTyle 2 when there are multiple heads present. My secondary
   motivation was that PyTyle 2 was a pig. For comparison sake, pytyle3 has
   about 1,000 lines of code while PyTyle 2 has about 7,000 lines. pytyle3
   is also visibly faster and more frugal with its memory usage.</p>

<h2>jamslam-x-go-binding</h2>
<p><a href="http://code.google.com/r/jamslam-x-go-binding/">jamslam-x-go-binding</a>
   is a clone of<a href="http://code.google.com/p/x-go-binding/">x-go-binding</a>.
   Both of which provide X bindings written in Go (and generated in the XCB
   style of doing things).</p>

<p>I've added support for the Xinerama extension, fixed several bugs and made
   XGB thread safe.</p>

<h2>xgbutil</h2>
<p><a href="https://github.com/BurntSushi/xgbutil">xgbutil</a> is a near
   direct port of xpybutil from Python to Go. At the present moment, xgbutil
   is more complete than xpybutil. Particularly in xgbutil's support for
   drawing images to windows and a more comprehensive implementation of
   the X keyboard encoding.</p>

<p>xgbutil also includes a main event loop implementation supported by binding
   callback functions to particular events and windows. However, users of the
   xgbutil library do not need to use its event loop or callback library.</p>

<h2>wingo</h2>
<p><a href="https://github.com/BurntSushi/wingo">wingo</a> is a window manager
   written in Go and is being actively developed. It is meant to be fully
   featured, EWMH compliant (as much as it can be), provide good support for
   multple heads, and implement good floating <em>and</em> tiling window
   placement strategies.</p>

<p>The name comes from the combination of "<strong>win</strong>dow
   manager" and "<strong>Go</strong>", and the fact that it is one of Dale 
   Gribble's catch phrases.</p>

<?php require_once('homepage_footer.php'); ?>
