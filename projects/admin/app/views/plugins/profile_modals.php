        <!-- Modal para Cambiar Contraseña -->
        <div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="changePasswordModalLabel">Cambiar Contraseña</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="../controllers/profile_controller.php" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="currentPassword">Contraseña Actual</label>
                                <input type="password" class="form-control" id="currentPassword" name="currentPassword" required>
                            </div>
                            <div class="form-group">
                                <label for="newPassword">Nueva Contraseña</label>
                                <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                            </div>
                            <div class="form-group">
                                <label for="confirmPassword">Confirmar Nueva Contraseña</label>
                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary" name="change_password">Guardar Cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal para Editar Información de Contacto -->
        <div class="modal fade" id="editContactInfoModal" tabindex="-1" aria-labelledby="editContactInfoModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editContactInfoModalLabel">Editar Información de Contacto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="../controllers/profile_controller.php" method="post">
                            <input type="hidden" name="action" value="updateContactInfo">
                            <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($userId); ?>">
                            <div class="form-group">
                                <label for="edit_address">Dirección</label>
                                <input type="text" class="form-control" id="edit_address" name="address" value="<?php echo htmlspecialchars($userData['address']); ?>">
                            </div>
                            <div class="form-group">
                                <label for="edit_phone_number">Número de Teléfono</label>
                                <input type="text" class="form-control" id="edit_phone_number" name="phone_number" value="<?php echo htmlspecialchars($userData['phone_number']); ?>">
                            </div>
                            <div class="form-group">
                                <label for="edit_additional_phone">Número Adicional</label>
                                <input type="text" class="form-control" id="edit_additional_phone" name="additional_phone" value="<?php echo htmlspecialchars($userData['additional_phone']); ?>">
                            </div>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success">Guardar Cambios</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal para Editar Información Adicional (Género) -->
        <div class="modal fade" id="editAdditionalInfoModal" tabindex="-1" aria-labelledby="editAdditionalInfoModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editAdditionalInfoModalLabel">Editar Género</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="../controllers/profile_controller.php" method="post">
                            <input type="hidden" name="action" value="updateAdditionalInfo">
                            <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($userId); ?>">
                            <div class="form-group">
                                <label for="edit_gender">Género</label>
                                <select class="form-control" id="edit_gender" name="gender">
                                    <option value="Masculino" <?php echo ($userData['gender'] == 'Masculino') ? 'selected' : ''; ?>>Masculino</option>
                                    <option value="Femenino" <?php echo ($userData['gender'] == 'Femenino') ? 'selected' : ''; ?>>Femenino</option>
                                    <option value="Ninguno" <?php echo ($userData['gender'] == 'Ninguno') ? 'selected' : ''; ?>>Ninguno</option>
                                    <option value="Otro" <?php echo ($userData['gender'] == 'Otro') ? 'selected' : ''; ?>>Otro</option>
                                </select>
                            </div>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-warning">Guardar Cambios</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>