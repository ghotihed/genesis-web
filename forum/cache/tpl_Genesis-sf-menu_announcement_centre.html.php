<?php if (!defined('IN_PHPBB')) exit; if ($this->_rootref['ANNOUNCEMENT_SHOW_BIRTHDAYS_ALWAYS'] && ! $this->_rootref['ANNOUNCEMENT_ENABLE'] && $this->_rootref['ANNOUNCEMENT_BIRTHDAYS']) {  ?>

	<div class="forumbg">
		<div class="inner"><span class="corners-top"><span></span></span>
			<table class="table1" cellspacing="1">
				<thead>
					<tr>
						<th style="text-align:left;">
							<?php if ($this->_rootref['ANNOUNCEMENT_TITLE']) {  ?> <?php echo (isset($this->_rootref['ANNOUNCEMENT_TITLE'])) ? $this->_rootref['ANNOUNCEMENT_TITLE'] : ''; ?> <?php } else { ?> <?php echo ((isset($this->_rootref['L_ANNOUNCEMENT_TITLE'])) ? $this->_rootref['L_ANNOUNCEMENT_TITLE'] : ((isset($user->lang['ANNOUNCEMENT_TITLE'])) ? $user->lang['ANNOUNCEMENT_TITLE'] : '{ ANNOUNCEMENT_TITLE }')); } ?>

						</th>
					</tr>
				</thead>
				<tbody>
					<tr class="bg3">
						<td style="text-align:center;">
							<?php echo (isset($this->_rootref['ANNOUNCEMENT_BIRTHDAY_IMG'])) ? $this->_rootref['ANNOUNCEMENT_BIRTHDAY_IMG'] : ''; ?><br />
								<table width="100%" >
									<tr style="border: 0px; padding:0;">
										<td align="center" style="border: 0px; padding:0;">
											<table>	
												<tr align="center" style="border: 0px; padding:0;">
												<?php if ($this->_rootref['ANNOUNCEMENT_BIRTHDAY_AVATAR']) {  $_bdannounce_count = (isset($this->_tpldata['bdannounce'])) ? sizeof($this->_tpldata['bdannounce']) : 0;if ($_bdannounce_count) {for ($_bdannounce_i = 0; $_bdannounce_i < $_bdannounce_count; ++$_bdannounce_i){$_bdannounce_val = &$this->_tpldata['bdannounce'][$_bdannounce_i]; ?>

													<td style="border: 0px; padding:0;">
														<table>
															<tr style="text-align:center; border: 0px;">
																<td style="border: 0px; padding:0;"><?php echo $_bdannounce_val['ANNOUNCEMENT_AVATAR']; ?></td>
															</tr>
															<tr align="center" valign="bottom" style="border: 0px; padding:0;">
																<td style="border: 0px; padding:0;font-size: 10px;" ><b><?php echo $_bdannounce_val['ANNOUNCEMENT_USERNAME']; ?></b></td>
															</tr>
														</table>
													</td>
													<?php }} } else { $_bdannounce_count = (isset($this->_tpldata['bdannounce'])) ? sizeof($this->_tpldata['bdannounce']) : 0;if ($_bdannounce_count) {for ($_bdannounce_i = 0; $_bdannounce_i < $_bdannounce_count; ++$_bdannounce_i){$_bdannounce_val = &$this->_tpldata['bdannounce'][$_bdannounce_i]; ?>

													<td style="border: 0px; padding:0 0 0 3px;font-size: 10px;"><b><?php echo $_bdannounce_val['ANNOUNCEMENT_USERNAME']; ?></b></td>
													<?php }} } ?>

												</tr>
											</table>
										</td>
									</tr>
								</table>
						</td>
					</tr>
				</tbody>
			</table>
		
		<span class="corners-bottom"><span></span></span></div>
	</div>
	<?php } if ($this->_rootref['ANNOUNCEMENT_ENABLE']) {  if ($this->_rootref['ANNOUNCEMENT_ENABLE_GUESTS'] && ! $this->_rootref['S_USER_LOGGED_IN'] && ! $this->_rootref['ANNOUNCEMENT_SHOW_EVERYONE'] && ! $this->_rootref['ANNOUNCEMENT_SHOW'] || $this->_rootref['ANNOUNCEMENT_SHOW']) {  if ($this->_rootref['ANNOUNCEMENT_ENABLE_GUESTS'] && ! $this->_rootref['S_USER_LOGGED_IN'] && ! $this->_rootref['ANNOUNCEMENT_SHOW_EVERYONE'] && ! $this->_rootref['ANNOUNCEMENT_SHOW']) {  ?>

						
							<div style="text-align:<?php echo (isset($this->_rootref['ANNOUNCEMENT_GUESTS_ALIGN'])) ? $this->_rootref['ANNOUNCEMENT_GUESTS_ALIGN'] : ''; ?>; list-style-position: inside;"><br /><?php echo (isset($this->_rootref['ANNOUNCEMENT_TEXT_GUESTS'])) ? $this->_rootref['ANNOUNCEMENT_TEXT_GUESTS'] : ''; ?><br /><br /></div>
						<?php } else if ($this->_rootref['ANNOUNCEMENT_SHOW']) {  if ($this->_rootref['ANNOUNCEMENT_SHOW_BIRTHDAY']) {  ?>

							<div style="text-align:center;"><?php echo (isset($this->_rootref['ANNOUNCEMENT_BIRTHDAY_IMG'])) ? $this->_rootref['ANNOUNCEMENT_BIRTHDAY_IMG'] : ''; ?><br /></div>
								<table width="100%" >
									<tr style="border: 0px; padding:0;">
										<td align="center" style="border: 0px; padding:0;">
											<table>	
												<tr align="center" style="border: 0px; padding:0;">
												<?php if ($this->_rootref['ANNOUNCEMENT_BIRTHDAY_AVATAR']) {  $_bdannounce_count = (isset($this->_tpldata['bdannounce'])) ? sizeof($this->_tpldata['bdannounce']) : 0;if ($_bdannounce_count) {for ($_bdannounce_i = 0; $_bdannounce_i < $_bdannounce_count; ++$_bdannounce_i){$_bdannounce_val = &$this->_tpldata['bdannounce'][$_bdannounce_i]; ?>

													<td style="border: 0px; padding:0;">
														<table>
															<tr style="text-align:center; border: 0px;">
																<td style="border: 0px; padding:0;"><?php echo $_bdannounce_val['ANNOUNCEMENT_AVATAR']; ?></td>
															</tr>
															<tr align="center" valign="bottom" style="border: 0px; padding:0;">
																<td style="border: 0px; padding:0;font-size: 10px;"><b><?php echo $_bdannounce_val['ANNOUNCEMENT_USERNAME']; ?></b></td>
															</tr>
														</table>
													</td>
													<?php }} } else { $_bdannounce_count = (isset($this->_tpldata['bdannounce'])) ? sizeof($this->_tpldata['bdannounce']) : 0;if ($_bdannounce_count) {for ($_bdannounce_i = 0; $_bdannounce_i < $_bdannounce_count; ++$_bdannounce_i){$_bdannounce_val = &$this->_tpldata['bdannounce'][$_bdannounce_i]; ?>

													<td style="border: 0px; padding:0 0 0 3px;font-size: 10px;"><b><?php echo $_bdannounce_val['ANNOUNCEMENT_USERNAME']; ?></b></td>
													<?php }} } ?>

												</tr>
											</table>
										</td>
									</tr>
							</table>
							<?php if ($this->_rootref['ANNOUNCEMENT_SHOW_BIRTHDAYS_AND_ANNOUNCE']) {  ?>

									
										<div style="text-align:<?php echo (isset($this->_rootref['ANNOUNCEMENT_ALIGN'])) ? $this->_rootref['ANNOUNCEMENT_ALIGN'] : ''; ?>; list-style-position: inside;">
										<hr/><?php echo (isset($this->_rootref['ANNOUNCEMENT_TEXT'])) ? $this->_rootref['ANNOUNCEMENT_TEXT'] : ''; ?>

											<?php if ($this->_rootref['S_HASATTACHMENTS']) {  ?>

												<dl class="attachbox">
													<dt><?php echo ((isset($this->_rootref['L_ATTACHMENTS'])) ? $this->_rootref['L_ATTACHMENTS'] : ((isset($user->lang['ATTACHMENTS'])) ? $user->lang['ATTACHMENTS'] : '{ ATTACHMENTS }')); ?></dt>
													<?php $_announcement_attachments_count = (isset($this->_tpldata['announcement_attachments'])) ? sizeof($this->_tpldata['announcement_attachments']) : 0;if ($_announcement_attachments_count) {for ($_announcement_attachments_i = 0; $_announcement_attachments_i < $_announcement_attachments_count; ++$_announcement_attachments_i){$_announcement_attachments_val = &$this->_tpldata['announcement_attachments'][$_announcement_attachments_i]; ?>

														<dd><?php echo $_announcement_attachments_val['DISPLAY_ATTACHMENTS']; ?></dd>
													<?php }} ?>

												</dl>
											<?php } if ($this->_rootref['U_ANNOUNCEMENT_GOTOPOST']) {  ?>

												<br />
												<a href="<?php echo (isset($this->_rootref['U_ANNOUNCEMENT_GOTOPOST'])) ? $this->_rootref['U_ANNOUNCEMENT_GOTOPOST'] : ''; ?>"><?php echo ((isset($this->_rootref['L_ANNOUNCEMENT_GOTOPOST'])) ? $this->_rootref['L_ANNOUNCEMENT_GOTOPOST'] : ((isset($user->lang['ANNOUNCEMENT_GOTOPOST'])) ? $user->lang['ANNOUNCEMENT_GOTOPOST'] : '{ ANNOUNCEMENT_GOTOPOST }')); ?></a>
																					
											<?php } ?>

											<br />
										</div>					
							<?php } } else { ?>

							<div class="rules" style="text-align:<?php echo (isset($this->_rootref['ANNOUNCEMENT_ALIGN'])) ? $this->_rootref['ANNOUNCEMENT_ALIGN'] : ''; ?>; list-style-position: inside;"><br /><?php echo (isset($this->_rootref['ANNOUNCEMENT_TEXT'])) ? $this->_rootref['ANNOUNCEMENT_TEXT'] : ''; ?>

							<?php if ($this->_rootref['S_HASATTACHMENTS']) {  ?>

								<dl class="attachbox">
									<dt><?php echo ((isset($this->_rootref['L_ATTACHMENTS'])) ? $this->_rootref['L_ATTACHMENTS'] : ((isset($user->lang['ATTACHMENTS'])) ? $user->lang['ATTACHMENTS'] : '{ ATTACHMENTS }')); ?></dt>
									<?php $_announcement_attachments_count = (isset($this->_tpldata['announcement_attachments'])) ? sizeof($this->_tpldata['announcement_attachments']) : 0;if ($_announcement_attachments_count) {for ($_announcement_attachments_i = 0; $_announcement_attachments_i < $_announcement_attachments_count; ++$_announcement_attachments_i){$_announcement_attachments_val = &$this->_tpldata['announcement_attachments'][$_announcement_attachments_i]; ?>

										<dd><?php echo $_announcement_attachments_val['DISPLAY_ATTACHMENTS']; ?></dd>
									<?php }} ?>

								</dl>
							<?php } if ($this->_rootref['U_ANNOUNCEMENT_GOTOPOST']) {  ?>

								<br />
								 <a href="<?php echo (isset($this->_rootref['U_ANNOUNCEMENT_GOTOPOST'])) ? $this->_rootref['U_ANNOUNCEMENT_GOTOPOST'] : ''; ?>" ><?php echo ((isset($this->_rootref['L_ANNOUNCEMENT_GOTOPOST'])) ? $this->_rootref['L_ANNOUNCEMENT_GOTOPOST'] : ((isset($user->lang['ANNOUNCEMENT_GOTOPOST'])) ? $user->lang['ANNOUNCEMENT_GOTOPOST'] : '{ ANNOUNCEMENT_GOTOPOST }')); ?></a>
																	
							<?php } ?>

							<br /></div>
											<?php } } } } ?>