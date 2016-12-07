            <div class="a">
                <div class="b">
                    <div class="c">
                        <a href="settings">
                            <div class="g is" alt="Settings" title="Settings"></div>
                        </a>

                        <div class="fr">
                        <a href="requests/add">
                            <div class="g ia" alt="Add Contact" title="Add Contact"></div>
                        </a>
                    </div>
                </div>

                <div class="d">
                    <a class="v gb y" href="contacts">Start Conversation</a>

                    <a class="x" href="contacts">
                        <div class="g ic" alt="Contacts" title="Contacts"></div>
                    </a>
                </div>

                <div class="e" id="h">
                    <?php if($data['newconversation'] != null && count($data['newconversation']) > 0) { ?>
                        
                    <div class="f k">
                        <div class="i"><?php echo $data['newconversation'][0]['username']; ?></div>
                        <div class="j fr"><?php echo $data['currenttime']; ?></div>
                        <div class="z"></div>
                    </div>
                    <?php } ?>
                    <?php foreach($data['conversations'] as $conversation) { ?>
                        
                    <div class="f <?php if($data['cguid'] && $conversation->conversation_guid == $data['cguid']) echo "k"; ?>">
                        <a href="conversations/display/<?php echo $conversation->contact_guid . "/" . $conversation->conversation_guid; ?>#l">
                            <div class="i"><?php if($conversation->alias != "") echo $conversation->alias . " - "; echo $conversation->username; ?></div>
                        </a>
                        <div class="cc j fr" data-md="<?php echo $conversation->made_date; ?>">
                            <?php echo $conversation->getMadeDate(); ?>
                            &nbsp;
                    
                            <a href="conversations/delete/<?php echo $conversation->conversation_guid; ?>">
                                <div class="g id" alt="Delete Conversation" title="Delete Conversation" style="width: 10px; height: 10px;"></div>
                            </a>
                        </div>

                        <div class="z"></div>
                    </div>
                    
                    <?php } ?>
                    
                </div>
                </div>

                <div class="l">
                    <div class="m">
                        <a href="logout">
                            <div class="g il fr" alt="Logout" title="Logout"></div>
                        </a>

                        <div class="z"></div>
                    </div>

                    <div class="n">
                        <?php if ($data['messages'] != null) {
                                foreach ($data['messages'] as $message) { 
                                    if ($message->user2_guid == $_SESSION[USESSION]->user_guid && $message->direction == 1) $sent = true; else $sent = false;
                        ?>

                        <div class="o <?php echo $sent ? "fr" : "fl"; ?>">
                            <div class="q <?php echo $sent ? "s" : "r"; ?>">
                                <?php echo $message->message; ?>
                                
                            </div>

                            <div class="z j aa <?php echo $sent ? "fr" : "fl"; ?>" data-md="<?php echo $message->made_date; ?>">
                                <?php echo $message->getMadeDate(); ?>
                                
                            </div>
                        </div>
                        <div class="p"></div>
                        <?php } } elseif ($data['guid'] == null) { ?>

                        <h3 class="ab">Start a new conversation or select an existing one on the left.</h3>
                        <?php } ?>

                        <div id="l"></div>
                    </div>
                </div>

                <form method="POST" action="conversations/send" id="s">
                    <div class="t">
                        <textarea class="u" name="m" id="m" placeholder="Enter your message here." autofocus <?php if($data['menu'] == null || $data['menu'] != "new") echo "onkeyup=\"if(event.keyCode == 13 && !event.shiftKey) c();\""; elseif ($data['menu'] == "new") echo "onkeyup=\"if(event.keyCode == 13 && !event.shiftKey) document.getElementById('s').submit();\""; ?><?php if ($data['guid'] == null) echo " disabled"; ?>></textarea>
                        <input class="v w" type="submit" name="ssubmit" value="Send" <?php if($data['menu'] == null || $data['menu'] != "new") echo "onclick=\"return c();\""; ?><?php if ($data['guid'] == null) echo " disabled"; ?>>
                        <input type="hidden" name="tg" value="<?php echo $data['guid']; ?>">
                    </div>
                </form>
            </div>

            <div class="h" id="c"><?php echo $data['cguid'] != null ? $data['cguid'] : ""; ?></div>
            <div class="h" id="g"><?php echo $data['guid'] != null ? $data['guid'] : ""; ?></div>
