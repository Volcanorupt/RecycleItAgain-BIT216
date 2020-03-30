
                <aside id="sidebar-left" class="sidebar-left">
                
                    <div class="sidebar-header">
                        <div class="sidebar-title">
                            Navigation
                        </div>
                        <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
                            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                        </div>
                    </div>
                
                    <div class="nano">
                        <div class="nano-content">
                            <nav id="menu" class="nav-main" role="navigation">
                                <ul class="nav nav-main">
                                    <li class="nav-parent">
                                        <a>
                                            <i class="fa fa-copy" aria-hidden="true"></i>
                                            <span>Submissions</span>
                                        </a>
                                        <ul class="nav nav-children">
                                            <li>
                                                <a href="addsubmissions.php">
                                                     Add Submissions
                                                </a>
                                            </li>
                                            <li>
                                                <a href="viewsubmissions.php">
                                                     View Submissions
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-parent">
                                        <a>
                                            <i class="fa fa-tasks" aria-hidden="true"></i>
                                            <span>Manage User Profile</span>
                                        </a>
                                        <ul class="nav nav-children">
                                            <li>
                                                <a href="changefullname.php">
                                                     Change Name
                                                </a>
                                            </li>
                                            <li>
                                                <a href="changepassword.php?del=<?php echo htmlentities($result->id);?>">
                                                     Change Password
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </aside>